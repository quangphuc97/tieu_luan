<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 9/6/2019
 * Time: 6:16 PM
 */

namespace App\Http\Controllers;

use App\HinhAnh;
use App\LoaiSanPham;
use App\SanPham;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Validator;

class SanPhamController extends Controller
{
    public function index()
    {
        $ds_sp = SanPham::paginate(5);
        return view('admin.sanpham.index')
            ->with('ds_sp', $ds_sp);
    }

    public function create()
    {
        $ds_loai = LoaiSanPham::all();
        return view('admin.sanpham.create')
            ->with('ds_loai', $ds_loai);
    }

    public function edit($id)
    {
        $ds_loai = LoaiSanPham::all();
        $san_pham = SanPham::where("ma_san_pham", $id)->first();
        return view('admin.sanpham.edit')
            ->with('san_pham', $san_pham)
            ->with('ds_loai', $ds_loai);

    }

    public function update(Request $request, $id)
    {

        $validation = $request->validate([
            'ten_san_pham' => 'required|string',
            'dien_giai' => 'required|string|max:4000',
            'gia'=>'required',
        ],[
            'ten_san_pham.required'=>'Bạn chưa nhập tên sản phẩm',
            'dien_giai.required'=>'Bạn chưa nhập mô tả',
            'gia.required'=>'Bạn chưa nhập giá',
        ]);

        $san_pham = SanPham::where("ma_san_pham", $id)->first();

        $san_pham->ten_san_pham=$request->ten_san_pham;
        $san_pham->dien_giai=$request->dien_giai;
        $san_pham->gia=$request->gia;
        $san_pham->ma_loai=$request->ma_lsp;

        if($request->hasFile('hinh_anh'))
        {
            Storage::delete('public/photos/' . $san_pham->anh_dai_dien);
            $file = $request->hinh_anh;
            $san_pham->anh_dai_dien = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/photos', $san_pham->anh_dai_dien);
        }
        if($request->hasFile('hinhanhlienquan')) {
            foreach($san_pham->hinhAnh as $hinhAnh)
            {
                Storage::delete('public/photos/' . $hinhAnh->dia_chi);
                $hinhAnh->delete();
            }
            $files = $request->hinhanhlienquan;
            foreach ($request->hinhanhlienquan as $index => $file) {

                $file->storeAs('public/photos', $file->getClientOriginalName());
                $hinhAnh = new Hinhanh();
                $hinhAnh->ma_san_pham = $san_pham->ma_san_pham;
                $hinhAnh->dia_chi = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }
        $san_pham->save();
        Session::flash('alert-info','Cập nhật thành công!');
        return redirect()->route('sanpham.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'ten_san_pham' => 'required',
            'gia' => 'required',
            'dien_giai' => 'required',
        ], [
            'ten_san_pham.required' => 'Bạn chưa nhập tên sản phẩm',
            'gia.required' => 'Bạn chưa nhập giá sản phẩm',
            'dien_giai.required' => 'Bạn chưa nhập diễn giải sản phẩm',
        ]);

        $san_pham = new SanPham();
        $san_pham->ten_san_pham = $request->ten_san_pham;
        $san_pham->gia = $request->gia;
        $san_pham->dien_giai = $request->dien_giai;
        $san_pham->ma_loai = $request->ma_lsp;

        if ($request->hasFile('hinh_anh')) {
            $file = $request->hinh_anh;
            $san_pham->anh_dai_dien = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/photos', $san_pham->anh_dai_dien);
        }

        $san_pham->save();

        if ($request->hasFile('hinhanhlienquan')) {
            $files = $request->hinhanhlienquan;
            foreach ($request->hinhanhlienquan as $index => $file) {
                $file->storeAs('public/photos', $file->getClientOriginalName());
                $hinhAnh = new HinhAnh();
                $hinhAnh->ma_san_pham = $san_pham->ma_san_pham;
                $hinhAnh->dia_chi = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }

        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('sanpham.index');
    }

    public function destroy($id)
    {

        $san_pham = SanPham::where("ma_san_pham", "=", $id)->first();
        Storage::delete('public/photos/' . $san_pham->anh_dai_dien);
        foreach ($san_pham->hinhAnh as $hinh_anh) {
            Storage::delete('public/photos/' . $hinh_anh->dia_chi);
        }
        $san_pham->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('sanpham.index');
    }

}
