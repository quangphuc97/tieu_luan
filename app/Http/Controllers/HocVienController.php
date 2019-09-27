<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 9/27/2019
 * Time: 11:54 AM
 */

namespace App\Http\Controllers;

use App\HocVien;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Validator;

class HocVienController extends Controller
{
    public function index()
    {
        $ds_hv = HocVien::paginate(5);
        return view('admin.hocvien.index')
            ->with('ds_hv', $ds_hv);
    }

    public function create()
    {
        return view('admin.hocvien.create');
    }

    public function edit($id)
    {
        $hoc_vien = HocVien::where("id_hoc_vien", $id)->first();
        return view('admin.hocvien.edit')
            ->with('hoc_vien',$hoc_vien);

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'ho_ten' => 'required',
            'username' => 'required',
            'password' => 'required',
            'dia_chi' => 'required',
            'sdt' => 'required',
        ], [
            'ho_ten.required' => 'Bạn chưa nhập họ tên',
            'username.required' => 'Bạn chưa nhập username',
            'password.required' => 'Bạn chưa nhập password',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
            'sdt.required' => 'Bạn chưa điện thoại',
        ]);

        $hoc_vien = HocVien::where("id_hoc_vien", $id)->first();
        $hoc_vien->ho_ten = $request->ho_ten;
        $hoc_vien->username = $request->ho_ten;
        $hoc_vien->password = $request->ho_ten;
        $hoc_vien->dia_chi = $request->ho_ten;
        $hoc_vien->sdt = $request->sdt;
        $hoc_vien->save();
        Session::flash('alert-info','Cập nhật thành công!');
        return redirect()->route('hocvien.index');
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
            'ho_ten' => 'required',
            'username' => 'required',
            'password' => 'required',
            'dia_chi' => 'required',
            'sdt' => 'required',
        ], [
            'ho_ten.required' => 'Bạn chưa nhập họ tên',
            'username.required' => 'Bạn chưa nhập username',
            'password.required' => 'Bạn chưa nhập password',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
            'sdt.required' => 'Bạn chưa điện thoại',
        ]);

        $hoc_vien = new HocVien();
        $hoc_vien->username= $request->username;
        $hoc_vien->password= $request->password;
        $hoc_vien->ho_ten= $request->ho_ten;
        $hoc_vien->dia_chi= $request->dia_chi;
        $hoc_vien->sdt= $request->sdt;
        $hoc_vien->email= $request->email;
        $hoc_vien->save();
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('hocvien.index');

    }

    public function destroy($id)
    {
        $hoc_vien = HocVien::where("id_hoc_vien", "=", $id)->first();
        $hoc_vien->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('hocvien.index');
    }

}