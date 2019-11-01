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
        $hoc_vien->username = $request->username;
        $hoc_vien->password = $request->password;
        $hoc_vien->dia_chi = $request->dia_chi;
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

    public function dangky(Request $request)
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
        Session::flash('alert-info', 'Đăng ký thành công!');
        return redirect()->route('dang-nhap');

    }

    public function dangnhap(Request $request){
        $hoc_vien = HocVien::where("username","=",$request->username)
            ->where("password","=",$request->password)
            ->first();
        if(!empty($hoc_vien))
        {
            $request->session()->put('id_hoc_vien', $hoc_vien->id_hoc_vien);
            if (empty(Session::get('url')))
                return redirect()->intended('/');
            else {
                $url = Session::get('url');
                Session::forget('url');
                return redirect()->intended($url);
            }
        }
       else {
           $request->session()->flash('alert-danger', 'Sai mật khẩu hoặc username');
           return redirect()->route('dang-nhap');
       }
    }

    public function viewChinhSua(Request $request){
        if(empty(Session::get('id_hoc_vien')))
        {
            $request->session()->put('url', route('chinh-sua'));
        return redirect()->route('dang-nhap');
        }
        else {
            $hoc_vien = HocVien::find(Session::get('id_hoc_vien'));
            return view('front-end.nguoi-dung.chinh-sua')
                ->with('hoc_vien',$hoc_vien);
        }
    }

    public function updateInfo(Request $request){

        $hoc_vien = HocVien::find(Session::get('id_hoc_vien'));
        $hoc_vien->ho_ten= $request->ho_ten;
        $hoc_vien->dia_chi= $request->dia_chi;
        $hoc_vien->sdt= $request->sdt;
        $hoc_vien->email= $request->email;
        $hoc_vien->save();
        Session::flash('alert-info', 'Thay đổi thành công!');
        return view('front-end.nguoi-dung.chinh-sua')
            ->with('hoc_vien',$hoc_vien);
    }

    public function updatePassword(Request $request){

        $hoc_vien = HocVien::find(Session::get('id_hoc_vien'));
        if($hoc_vien->password==$request->password_cu){
            $hoc_vien->password= $request->password;
            $hoc_vien->save();
            Session::flash('alert-info', 'Thay đổi thành công!');
            return view('front-end.nguoi-dung.chinh-sua')
                ->with('hoc_vien',$hoc_vien);
        }
        else {
            Session::flash('alert-danger', 'Sai password');
            return view('front-end.nguoi-dung.chinh-sua')
                ->with('hoc_vien',$hoc_vien);
        }

    }
}