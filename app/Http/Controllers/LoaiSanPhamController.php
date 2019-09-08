<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 9/2/2019
 * Time: 8:34 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\LoaiSanPham;
use Session;
class LoaiSanPhamController extends Controller
{
    public function index()
    {
        $ds_loai = LoaiSanPham::paginate(5);

        return view('admin.loaisp.index')
            ->with('danhsachloai', $ds_loai);

    }

    public function create()
    {
        return view('admin.loaisp.create');

    }

    public function edit($id)
    {
        $loai = LoaiSanPham::where("ma_loai", $id)->first();
        return view('admin.loaisp.edit')->with('loai', $loai);

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'ten_loai' =>'required|string',
        ],[
            'ten_loai.required'=>'Bạn chưa nhập tên loại sản phẩm'
        ]);
        $loai = LoaiSanPham::where("ma_loai","=",$id)->first();
        $loai->ten_loai= $request->ten_loai;
        $loai->save();
        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachloai.index');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'ten_loai' =>'required|string|unique:loai_san_pham',
        ],[
            'ten_loai.required'=>'Bạn chưa nhập tên loại sản phẩm',
            'ten_loai.unique'=>'Loại nông sản đã tồn tại'
        ]);
        $loai=new LoaiSanPham();
        $loai->ten_loai=$request->ten_loai;
        $loai->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachloai.index');

    }
    public function destroy($id)
    {
        $loai = LoaiSanPham::where("ma_loai","=", $id)->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachloai.index');
    }

}
