<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 10/2/2019
 * Time: 3:15 PM
 */

namespace App\Http\Controllers;

use App\Lop;
use App\GiaoVien;
use DB;
use Illuminate\Http\Request;
use Session;
use Validator;

class LopController extends Controller
{
    public function index()
    {
        $ds_lop = Lop::paginate(5);
        return view('admin.lop.index')
            ->with('danhsachlop', $ds_lop);

    }

    public function create()
    {
        $ds_gv = GiaoVien::all();
        return view('admin.lop.create')->with('ds_gv',$ds_gv);

    }

    public function edit($id)
    {
        $ds_gv = GiaoVien::all();
        $lop = Lop::where("ma_lop", $id)->first();
        return view('admin.lop.edit')->with('lop', $lop)->with('ds_gv',$ds_gv);

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'ten_lop' => 'required|string',
            'trang_thai' => 'required|string',
            'si_so' => 'required|string',
            'id_giao_vien' => 'required',
        ], [
            'ten_lop.required' => 'Bạn chưa nhập tên lớp',
            'trang_thai.required' => 'Bạn chưa nhập trạng thái',
            'si_so.required'=>'Bạn chưa nhập sỉ số',
            'id_giao_vien.required'=>'Bạn chưa nhập id giáo viên',
        ]);
        $lop = Lop::where("ma_lop", "=", $id)->first();
        $lop->ten_lop=$request->ten_lop;
        $lop->trang_thai= $request->trang_thai;
        $lop->si_so= $request->si_so;
        $lop->id_giao_vien = $request->id_giao_vien;
        $lop->save();
        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('lop.index');

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
            'ten_lop' => 'required|string',
            'si_so' => 'required|string',
        ], [
            'ten_lop.required' => 'Bạn chưa nhập tên lớp',
            'si_so.required'=>'Bạn chưa nhập sỉ số',

        ]);
        $lop = new Lop();
        $lop->ten_lop=$request->ten_lop;
        $lop->trang_thai= Lop::$chua_sap_lich;
        $lop->si_so= $request->si_so;
        $lop->id_giao_vien = $request->id_giao_vien;
        $lop->save();
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('lop.index');

    }

    public function destroy($id)
    {
        $lop = Lop::where("ma_lop", "=", $id)->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('lop.index');
    }

}
