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
Route::prefix('muahang')->group(function(){
    Route::get('/add/{id}','App\Http\Controllers\muahangController@themsp')->name('them.sp');
    Route::get('/danh-sach','App\Http\Controllers\muahangController@getlistshopping')->name('get.list.shopping');
    Route::get('/delete/{id}','App\Http\Controllers\muahangController@xoasp')->name('xoa.sp');
   
});
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
              Route::get('/','App\Http\Controllers\SanphamController@trangchu');
              
          });
          Route::group(['prefix'=>'danhmucsanpham'],function(){
              Route::get('/getlist','App\Http\Controllers\SanphamController@getlist');
              Route::get('/getSanPham','App\Http\Controllers\SanphamController@getSanPham');
              Route::post('/postSanPham','App\Http\Controllers\SanphamController@postSanPham');
              Route::get('/getXoaSP/{id}','App\Http\Controllers\SanphamController@getXoaSP');
              Route::get('/getSuaSP/{id}','App\Http\Controllers\SanphamController@getSuaSP');
              Route::post('/postSuaSanPham','App\Http\Controllers\SanphamController@postSuaSanPham');
              
          });
  /* admin */