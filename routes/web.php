<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Auth::routes();
Route::group(['namespace'=>'App\Http\Controllers\Auth'],function () {
  // Route::get('dang-ky','RegisterController@getRegister')->name('get.dangky');
  // Route::post('dang-ky','RegisterController@postRegister')->name('post.dangky');
  
  // Route::get('dang-nhap','LoginController@getLogin')->name('get.dangnhap');
  // Route::post('dang-nhap','LoginController@postLogin')->name('post.dangnhap');

  Route::get('/logout','App\Http\Controllers\Auth\logout@logout')->name('logout');
  
  Route::get('/lay-lai-mat-khau','ForgotPasswordController@getformresetpassword')->name('get.reset.password');
  Route::post('/lay-lai-mat-khau','ForgotPasswordController@sendcoderesetpassword');
  
  Route::get('/dat-lai-mat-khau','ForgotPasswordController@resetpassword')->name('get.send.email');
  Route::post('/dat-lai-mat-khau','ForgotPasswordController@saveresetpassword');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gioi-thieu','App\Http\Controllers\HomeController@gioithieu')->name('gioithieu');
Route::get('/lien-he','App\Http\Controllers\HomeController@lienhe')->name('lienhe');;
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');;
// Route::get('loaisanpham/{id}','App\Http\Controllers\FrontendController@loaisanpham');
Route::get('loai-san-pham/{id}','App\Http\Controllers\FrontendController@getListProduct')->name('get.list.product');
Route::get('san-pham/{id}','App\Http\Controllers\FrontendController@productDetail')->name('get.product.detail');
Route::post('/add-cart-ajax','App\Http\Controllers\muahangController@add_cart_ajax')->name('cart.add'); 
Route::get('/gio-hang','App\Http\Controllers\muahangController@gio_hang')->name('gio.hang'); 
Route::post('/check-coupon', 'App\Http\Controllers\muahangController@check_coupon');
Route::post('/update-cart', 'App\Http\Controllers\muahangController@update_cart');
Route::get('/delete/{session_id}','App\Http\Controllers\muahangController@delete')->name('delete.sp');
Route::get('/del-all-product','App\Http\Controllers\muahangController@delete_all_product')->name('delete.all');
Route::get('/unset-coupon','App\Http\Controllers\muahangController@unset_coupon')->name('unset.coupon');
Route::post('/select-delivery-home','App\Http\Controllers\muahangController@select_delivery_home')->name('select.dev');

Route::group(['prefix'=>'gio-hang','middleware'=>'\App\Http\Middleware\CheckLoginUser'],function(){
  Route::get('/thanh-toan','App\Http\Controllers\muahangController@getformpay')->name('get.form.pay');
  Route::post('/thanh-toan','App\Http\Controllers\muahangController@saveGiohang');
});



// Route::get('/email/verify', function () {
  //   return view('auth.verify-email');
  // })->middleware('auth')->name('verification.notice');
  // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    //   $request->fulfill();

    //   return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');
// Route::post('/email/verification-notification', function (Request $request) {
  //   $request->user()->sendEmailVerificationNotification();

  //   return back()->with('message', 'Verification link sent!');
  // })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
  /* admin */

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