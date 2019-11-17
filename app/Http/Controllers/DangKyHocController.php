<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 9/19/2019
 * Time: 4:53 PM
 */

namespace App\Http\Controllers;

use App\GiaoVien;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Validator;
use App\Lop;
use App\Hoc;

class DangKyHocController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function edit($id)
    {


    }

    public function update(Request $request, $id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty(Session::get('id_hoc_vien')))
        {
            $request->session()->put('url', route('dang-ky-hoc',['ma_lop'=>$request->ma_lop]));
            return redirect()->route('dang-nhap');
        }
        else {
            $id_hoc_vien=Session::get('id_hoc_vien');
          if(empty(Hoc::where('id_hoc_vien',$id_hoc_vien)->count())){
              $hoc = new Hoc();
              $hoc->ma_lop= $request->ma_lop;
              $hoc->trang_thai = Hoc::$trang_thai_xu_ly;
              $hoc->id_hoc_vien= $id_hoc_vien;
              $hoc->save();
              Session::flash('alert-info', 'Đăng ký học thành công!');
              return redirect()->back();
          }
          else {
              Session::flash('alert-danger', 'Bạn đã đăng ký lớp này rồi');
              return redirect()->back();
          }

        }
    }

    public function destroy($id)
    {
        $hoc = Hoc::find($id);
        $hoc->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->back();

    }

    public function duyet($id)
    {
        $hoc = Hoc::find($id);
        $hoc->trang_thai= Hoc::$trang_thai_duyet;
            $hoc->save();
        Session::flash('alert-info', 'Duyệt học thành công!');
        return redirect()->back();
    }

    public function dangKyHoc(Request $request){
        $lop = Lop::find($request->id);
        $so_luong_con_lai= $lop->si_so -  Hoc::where('ma_lop',$request->id)->count();
        return view('front-end.lich.dangky')
            ->with('so_luong_con_lai',$so_luong_con_lai)
            ->with("lop",$lop);
    }

    public function danhSachLop(Request $request){
        $lop = Lop::find($request->id);
       $si_so= Hoc::where('ma_lop',$request->id)->count();
        return view ('admin.hoc.index')
            ->with('si_so',$si_so)
            ->with("lop",$lop);
    }

}