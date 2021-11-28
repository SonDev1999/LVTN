<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// }); 
Route::get('/gioi-thieu','App\Http\Controllers\HomeController@gioithieu')->name('gioithieu');
Route::get('/lien-he','App\Http\Controllers\HomeController@lienhe')->name('lienhe');;
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');;
// Route::get('loaisanpham/{id}','App\Http\Controllers\FrontendController@loaisanpham');
Route::get('loai-san-pham/{id}','App\Http\Controllers\FrontendController@getListProduct')->name('get.list.product');
Route::get('san-pham/{id}','App\Http\Controllers\FrontendController@productDetail')->name('get.product.detail');
Route::prefix('muahang')->group(function(){
    Route::get('/add/{id}','App\Http\Controllers\muahangController@themsp')->name('them.sp');
});
/* admin */
    Route::get('/login','App\Http\Controllers\SanphamController@login');
    Route::get('/test','App\Http\Controllers\SanphamController@test');
        Route::post('/post_login','App\Http\Controllers\SanphamController@post_login');
        Route::group(['prefix'=>'admin'],function(){
            Route::get('/','App\Http\Controllers\BangDieuKhienController@getBangDieuKhien');

            Route::group(['prefix'=>'danhmucsanpham'],function(){
                Route::get('/getlist','App\Http\Controllers\SanphamController@getlist')->name('listsanpham');
                Route::get('/getSanPham','App\Http\Controllers\SanphamController@getSanPham');
                Route::post('/postSanPham','App\Http\Controllers\SanphamController@postSanPham');
                Route::get('/getXoaSP/{id}','App\Http\Controllers\SanphamController@getXoaSP');
                Route::get('/getSuaSP/{id}','App\Http\Controllers\SanphamController@getSuaSP');
                Route::post('/postSuaSanPham','App\Http\Controllers\SanphamController@postSuaSanPham');
                
            });
            Route::group(['prefix'=>'danhmuctuyendung'],function(){
                Route::get('getList','App\Http\Controllers\TuyenDungController@getList')->name('listtuyendung');
                Route::get('getThem','App\Http\Controllers\TuyenDungController@getThem');
                Route::post('postThem','App\Http\Controllers\TuyenDungController@postThem');
                Route::get('getXoa/{id}','App\Http\Controllers\TuyenDungController@getXoa');
                Route::get('getSua/{id}','App\Http\Controllers\TuyenDungController@getSua');
                Route::post('postSua','App\Http\Controllers\TuyenDungController@postSua');
            });
            Route::group(['prefix'=>'danhmuctintuc'],function(){
                Route::get('getList','App\Http\Controllers\TinTucController@getList')->name('listtintuc');
                Route::get('getThem','App\Http\Controllers\TinTucController@getThem');
                Route::post('postThem','App\Http\Controllers\TinTucController@postThem');
                Route::get('getXoa/{id}','App\Http\Controllers\TinTucController@getXoa');
                Route::get('getSua/{id}','App\Http\Controllers\TinTucController@getSua');
                Route::post('postSua','App\Http\Controllers\TinTucController@postSua');
            });
            Route::group(['prefix'=>'danhmucslidershow'],function(){
                Route::get('getList','App\Http\Controllers\SliderShowController@getList')->name('listslider');
                Route::get('getThem','App\Http\Controllers\SliderShowController@getThem')->name('themslider');
                Route::post('postThem','App\Http\Controllers\SliderShowController@postThem');
                Route::get('getXoa/{id}','App\Http\Controllers\SliderShowController@getXoa');
                Route::get('getSua/{id}','App\Http\Controllers\SliderShowController@getSua');
                Route::post('postSua','App\Http\Controllers\SliderShowController@postSua');
            });
            Route::group(['prefix'=>'danhmuckhuyenmai'],function(){
                Route::get('getList','App\Http\Controllers\khuyenmaiController@getList')->name('listkhuyenmai');
                Route::get('getThem','App\Http\Controllers\khuyenmaiController@getThem')->name('themkhuyenmai');
                Route::post('postThem','App\Http\Controllers\khuyenmaiController@postThem');
                Route::get('getXoa/{id}','App\Http\Controllers\khuyenmaiController@getXoa');
                Route::get('getSua/{id}','App\Http\Controllers\khuyenmaiController@getSua');
                Route::post('postSua','App\Http\Controllers\khuyenmaiController@postSua');
            });
            Route::group(['prefix'=>'danhmucloaisanpham'],function(){
                Route::get('getList','App\Http\Controllers\LoaiSanPhamController@getList')->name('listLoaiSanPham');
                Route::get('getThem','App\Http\Controllers\LoaiSanPhamController@getThem')->name('themLoaiSanPham');
                Route::post('postThem','App\Http\Controllers\LoaiSanPhamController@postThem');
                Route::get('getXoa/{id}','App\Http\Controllers\LoaiSanPhamController@getXoa');
                Route::get('getSua/{id}','App\Http\Controllers\LoaiSanPhamController@getSua');
                Route::post('postSua','App\Http\Controllers\LoaiSanPhamController@postSua');
            });
            Route::group(['prefix'=>'danhmucnhasanxuat'],function(){
                Route::get('getList','App\Http\Controllers\NhaSanXuatController@getList')->name('listNhaSanXuat');
                Route::get('getThem','App\Http\Controllers\NhaSanXuatController@getThem')->name('themNhaSanXuat');
                Route::post('postThem','App\Http\Controllers\NhaSanXuatController@postThem');
                Route::get('getXoa/{id}','App\Http\Controllers\NhaSanXuatController@getXoa');
                Route::get('getSua/{id}','App\Http\Controllers\NhaSanXuatController@getSua');
                Route::post('postSua','App\Http\Controllers\NhaSanXuatController@postSua');
            });
            Route::group(['prefix'=>'danhmuckhachhang'],function(){
                Route::get('getList','App\Http\Controllers\KhachHangController@getList')->name('listKhachHang');
                Route::get('getThem','App\Http\Controllers\KhachHangController@getThem')->name('themKhachHang');
                Route::post('postThem','App\Http\Controllers\KhachHangController@postThem');
                Route::get('getXoa/{id}','App\Http\Controllers\KhachHangController@getXoa');
                Route::get('getmotk/{id}','App\Http\Controllers\KhachHangController@getmotk');
                Route::get('getkhoatk/{id}','App\Http\Controllers\KhachHangController@getkhoatk');
            });
            Route::group(['prefix'=>'danhmucnhanvien'],function(){
                Route::get('getList','App\Http\Controllers\NhanVienController@getList')->name('listNhanVien');
                Route::get('getThem','App\Http\Controllers\NhanVienController@getThem')->name('themNhanVien');
                Route::post('postThem','App\Http\Controllers\NhanVienController@postThem')->name('postthemNhanVien');
                Route::get('getmotk/{id}','App\Http\Controllers\NhanVienController@getmotk');
                Route::get('getkhoatk/{id}','App\Http\Controllers\NhanVienController@getkhoatk');
                Route::get('getXoa/{id}','App\Http\Controllers\NhanVienController@getXoa');
            });
            Route::group(['prefix'=>'danhmucdonhang'],function(){
                Route::get('getDSDHChoDuyet','App\Http\Controllers\DonHangController@getDSDHChoDuyet')->name('getDSDHChoDuyet');
                Route::get('getDSDHChoGiao','App\Http\Controllers\DonHangController@getDSDHChoGiao')->name('getDSDHChoGiao');
                Route::get('getDSDHBiHuy','App\Http\Controllers\DonHangController@getDSDHBiHuy')->name('getDSDHBiHuy');
                Route::get('getDSDHDaGiao','App\Http\Controllers\DonHangController@getDSDHDaGiao')->name('getDSDHDaGiao');
                Route::get('getCTDH/{id}','App\Http\Controllers\DonHangController@getCTDH')->name('getCTDH');
                Route::get('getDuyetDH/{id}','App\Http\Controllers\DonHangController@getDuyetDH')->name('getDuyetDH');
                Route::get('getXoaDH/{id}','App\Http\Controllers\DonHangController@getXoaDH')->name('getXoaDH');
                Route::get('getHuyDH/{id}','App\Http\Controllers\DonHangController@getHuyDH')->name('getHuyDH');

                /* Route::get('getThem','App\Http\Controllers\DonHangController@getThem')->name('themNhanVien');
                Route::post('postThem','App\Http\Controllers\DonHangController@postThem')->name('postthemNhanVien');
                Route::get('getmotk/{id}','App\Http\Controllers\DonHangController@getmotk');
                Route::get('getkhoatk/{id}','App\Http\Controllers\DonHangController@getkhoatk');
                Route::get('getXoa/{id}','App\Http\Controllers\DonHangController@getXoa'); */
            });
        });
        
/* admin */