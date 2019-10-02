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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('/danhsachloai','LoaiSanPhamController');
    Route::resource('thongbao','ThongBaoController');
    Route::resource('sanpham','SanPhamController');
    Route::resource('taikhoan/giaovien','GiaoVienController');
    Route::resource('taikhoan/hocvien','HocVienController');
    Route::resource('giangday/lop','LopController');
});

//Route::get('/phuc', function () {
////  echo  asset('storage/photos/carot.jpg');
////  echo File::size(asset('storage/photos/carot.jpg'));
////    echo Storage::size('/photos/carot.jpg');
////echo  Storage::url('photos/carot.jpg');
////    echo Storage::size('carot.jpg');
//    echo Storage::size('public/photos/caRot.jpeg');
//   echo asset('storage/photos/caRot.jpeg');
//});