<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/', function(){
    return view('front-end.index');
})->name('trang-chu');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dangky', function(){
    return view('front-end.nguoi-dung.dang-ky');
})->name('dang-ky');
Route::get('/dangnhap', function(){
    return view('front-end.nguoi-dung.dang-nhap');
})->name('dang-nhap');
Route::post('/dangky', 'HocVienController@dangky')->name('dang-ky');
Route::post('/dangnhap', 'HocVienController@dangnhap')->name('dang-nhap');
Route::get('/dangxuat', function(){
    Request::session()->flush();
    return redirect()->intended('/');
})->name('dang-xuat');

Route::get('/loaisanpham', 'SanPhamController@loadLoai');
Route::get('/chinh-sua', 'HocVienController@viewChinhSua')->name('chinh-sua');
Route::post('/chinh-sua', 'HocVienController@updateInfo')->name('chinh-sua');
Route::post('/chinh-sua-pass', 'HocVienController@updatePassword')->name('chinh-sua-pass');
Route::get('/sanpham/{id}', 'SanPhamController@loadSanPham')->name('load-san-pham');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('/danhsachloai','LoaiSanPhamController');
    Route::resource('thongbao','ThongBaoController');
    Route::resource('sanpham','SanPhamController');
    Route::resource('taikhoan/giaovien','GiaoVienController');
    Route::resource('taikhoan/hocvien','HocVienController');
    Route::resource('giangday/lop','LopController');
    Route::resource('giangday/lich','LichController');
});