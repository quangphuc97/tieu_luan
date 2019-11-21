<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 9/29/2019
 * Time: 8:48 PM
 */

namespace App\Http\Controllers;

use App\ThongBao;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Validator;

class ThongBaoController extends Controller
{
    public function index()
    {
        $ds_thong_bao = ThongBao::paginate(5);
        return view('admin.thongbao.index')
            ->with('ds_thong_bao', $ds_thong_bao);
    }

    public function create()
    {
        return view('admin.thongbao.create');
    }

    public function edit($id)
    {
        $thong_bao = ThongBao::where("id", $id)->first();
        return view('admin.thongbao.edit')
            ->with('thong_bao', $thong_bao);

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'tieu_de' => 'required',
            'noi_dung' => 'required',
        ], [
            'tieu_de.required' => 'Bạn chưa nhập tiêu đề',
            'noi_dung.required' => 'Bạn chưa nhập nội dung',
        ]);

        $thong_bao = ThongBao::where("id", $id)->first();

        $thong_bao->tieu_de=$request->tieu_de;
        $thong_bao->noi_dung=$request->noi_dung;
        $thong_bao->bat_dau=$request->bat_dau;
        $thong_bao->ket_thuc=$request->ket_thuc;
        $thong_bao->save();
        Session::flash('alert-info','Cập nhật thành công!');
        return redirect()->route('thongbao.index');

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
            'tieu_de' => 'required',
            'noi_dung' => 'required',
        ], [
            'tieu_de.required' => 'Bạn chưa nhập tiêu đề',
            'noi_dung.required' => 'Bạn chưa nhập nội dung',
        ]);

        $thong_bao = new ThongBao();
        $thong_bao->tieu_de = $request->tieu_de;
        $thong_bao->noi_dung = $request->noi_dung;
        $thong_bao->bat_dau = $request->bat_dau;
        $thong_bao->ket_thuc = $request->ket_thuc;
        $thong_bao->save();
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('thongbao.index');
    }

    public function destroy($id)
    {
        $thong_bao = ThongBao::where("id", "=", $id)->first();
        $thong_bao->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('thongbao.index');
    }

    public function frontEndIndex(){
        $ds_thong_bao = ThongBao::orderBy('bat_dau', 'desc')->paginate(5);
        return view('front-end.thong-bao.index')
            ->with('ds_thong_bao', $ds_thong_bao);
    }

    public function frontEndload (Request $request){
        $data= ThongBao::find($request->id);
        return view('front-end.thong-bao.load')
            ->with('data', $data);
    }

}