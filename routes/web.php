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
Route::get('/giaovien/dangnhap', function(){
    return view('front-end.giao-vien.dang-nhap');
})->name('giao-vien-dang-nhap');
Route::post('/giaovien/dangnhap', 'GiaoVienController@dangnhap')->name('giao-vien-dang-nhap');


Route::get('/loaisanpham', 'SanPhamController@loadLoai');
Route::get('/chinh-sua', 'HocVienController@viewChinhSua')->name('chinh-sua');
Route::get('/chinh-sua-giao-vien', 'GiaoVienController@viewChinhSua')->name('chinh-sua-giao-vien');
Route::post('/chinh-sua-giao-vien', 'GiaoVienController@updateInfo')->name('chinh-sua-giao-vien');
Route::post('/chinh-sua', 'HocVienController@updateInfo')->name('chinh-sua');
Route::post('/chinh-sua-pass', 'HocVienController@updatePassword')->name('chinh-sua-pass');
Route::post('/chinh-sua-pass-giao-vien', 'GiaoVienController@updatePassword')->name('chinh-sua-pass-giao-vien');
Route::get('/sanpham/{id}', 'SanPhamController@loadSanPham')->name('load-san-pham');
Route::get('/lichhoc', 'LichController@showCalendar')->name('lichhoc');
Route::get('/lichday', 'LichController@showlichday')->name('lichday');
Route::get('/danhsachlopday/{id}', 'LichController@danhsachlop')->name('danhsachlopday');
Route::get('/dangkyhoc/{id}', 'DangKyHocController@dangKyHoc')->name("dang-ky-hoc");
Route::post('/dangkyhoc/{ma_lop}', 'DangKyHocController@store')->name("dang-ky-hoc");

Route::get('/thongbao', 'ThongBaoController@frontEndIndex')->name("thong-bao-index");
Route::get('/thongbao/load/{id}', 'ThongBaoController@frontEndLoad')->name("thong-bao-load");
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('/danhsachloai','LoaiSanPhamController');
    Route::resource('thongbao','ThongBaoController');
    Route::resource('sanpham','SanPhamController');
    Route::resource('taikhoan/giaovien','GiaoVienController');
    Route::resource('taikhoan/hocvien','HocVienController');
    Route::resource('giangday/lop','LopController');
    Route::resource('giangday/lich','LichController');
    Route::get('/danhsachlop', 'DangKyHocController@danhsachlop')->name('danhsachlop');
    Route::post('/xoahoc/{id}', 'DangKyHocController@destroy')->name('xoahoc');
    Route::get('/duyet/{id}', 'DangKyHocController@duyet')->name('duyethoc');

});