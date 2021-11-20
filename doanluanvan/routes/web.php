<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

  // Route::get('dang-ky','RegisterController@getRegister')->name('get.dangky');
  // Route::post('dang-ky','RegisterController@postRegister')->name('post.dangky');
  // Route::get('dang-nhap','LoginController@getLogin')->name('get.dangnhap');
  // Route::get('/logout','App\Http\Controllers\Auth\logout@logout')->name('logout');
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
Auth::routes();
Route::group(['namespace'=>'App\Http\Controllers\Auth'],function () {
  Route::get('/lay-lai-mat-khau','ForgotPasswordController@getformresetpassword')->name('get.reset.password');
  Route::post('/lay-lai-mat-khau','ForgotPasswordController@sendcoderesetpassword');

  Route::get('/dat-lai-mat-khau','ForgotPasswordController@resetpassword')->name('get.send.email');
  Route::post('/dat-lai-mat-khau','ForgotPasswordController@saveresetpassword');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');