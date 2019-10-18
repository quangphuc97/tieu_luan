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
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('/danhsachloai','LoaiSanPhamController');
    Route::resource('thongbao','ThongBaoController');
    Route::resource('sanpham','SanPhamController');
    Route::resource('taikhoan/giaovien','GiaoVienController');
    Route::resource('taikhoan/hocvien','HocVienController');
    Route::resource('giangday/lop','LopController');
    Route::resource('giangday/lich','LichController');
});