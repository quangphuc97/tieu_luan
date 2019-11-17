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
use File;
class GiaoVienController  extends Controller
{
    public function index()
    {
        $ds_gv = GiaoVien::paginate(5);
        return view('admin.giaovien.index')
            ->with('ds_gv', $ds_gv);
    }

    public function create()
    {
        return view('admin.giaovien.create');
    }

    public function edit($id)
    {
        $giao_vien = GiaoVien::where("id_giao_vien", $id)->first();
        return view('admin.giaovien.edit')
           ->with('giao_vien',$giao_vien);

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

        $giao_vien = GiaoVien::where("id_giao_vien", $id)->first();
        $giao_vien->ho_ten = $request->ho_ten;
        $giao_vien->username = $request->ho_ten;
        $giao_vien->password = $request->ho_ten;
        $giao_vien->dia_chi = $request->ho_ten;
        $giao_vien->sdt = $request->sdt;
        if($request->hasFile('hinh_anh'))
        {
            Storage::delete('public/photos/' . $giao_vien->anh_dai_dien);
            $file = $request->hinh_anh;
            $giao_vien->anh_dai_dien = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/photos', $giao_vien->anh_dai_dien);
        }
        $giao_vien->save();
        Session::flash('alert-info','Cập nhật thành công!');
        return redirect()->route('giaovien.index');
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

        $giao_vien = new GiaoVien();
        $giao_vien->username= $request->username;
        $giao_vien->password= $request->password;
        $giao_vien->ho_ten= $request->ho_ten;
        $giao_vien->dia_chi= $request->dia_chi;
        $giao_vien->sdt= $request->sdt;
        $giao_vien->email= $request->email;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->hinh_anh;
            $giao_vien->anh_dai_dien = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/photos', $giao_vien->anh_dai_dien);
        }
        $giao_vien->save();

        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('giaovien.index');

    }

    public function destroy($id)
    {
        $giao_vien = GiaoVien::where("id_giao_vien", "=", $id)->first();
        Storage::delete('public/photos/' . $giao_vien->anh_dai_dien);
        $giao_vien->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('giaovien.index');
   
    }

    public function dangnhap(Request $request){
        $giao_vien = GiaoVien::where("username","=",$request->username)
            ->where("password","=",$request->password)
            ->first();
        if(!empty($giao_vien))
        {
            $request->session()->put('id_giao_vien', $giao_vien->id_giao_vien);
            Session::forget('url');
            return redirect()->intended('/');

        }
        else {
            $request->session()->flash('alert-danger', 'Sai mật khẩu hoặc username');
            return redirect()->route('giao-vien-dang-nhap');
        }
    }

    public function viewChinhSua(Request $request){
        if(empty(Session::get('id_giao_vien')))
        {
            return redirect()->route('giao-vien-dang-nhap');
        }
        else {
            $giao_vien = GiaoVien::find(Session::get('id_giao_vien'));
            return view('front-end.giao-vien.chinh-sua')
                ->with('giao_vien',$giao_vien);
        }
    }

    public function updateInfo(Request $request){

        $giao_vien = GiaoVien::find(Session::get('id_giao_vien'));
        $giao_vien->ho_ten= $request->ho_ten;
        $giao_vien->dia_chi= $request->dia_chi;
        $giao_vien->sdt= $request->sdt;
        $giao_vien->email= $request->email;
        if ($request->hasFile('anh_dai_dien')) {
            File::delete('storage/photos/' . $giao_vien->anh_dai_dien);
            $file = $request->anh_dai_dien;
            $giao_vien->anh_dai_dien = $file->getClientOriginalName();
            $fileSaved = $file->move('storage/photos', $file->getClientOriginalName());
        }
        $giao_vien->save();
        Session::flash('alert-info', 'Thay đổi thành công!');
        return view('front-end.giao-vien.chinh-sua')
            ->with('giao_vien',$giao_vien);
    }

    public function updatePassword(Request $request){

        $giao_vien = GiaoVien::find(Session::get('id_giao_vien'));
        if($giao_vien->password==$request->password_cu){
            $giao_vien->password= $request->password;
            $giao_vien->save();
            Session::flash('alert-info', 'Thay đổi thành công!');
            return view('front-end.giao-vien.chinh-sua')
                ->with('giao_vien',$giao_vien);
        }
        else {
            Session::flash('alert-danger', 'Sai password');
            return view('front-end.giao-vien.chinh-sua')
                ->with('giao_vien',$giao_vien);
        }

    }
}