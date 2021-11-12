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
/* admin */
    Route::get('/login','App\Http\Controllers\SanphamController@login');
    Route::get('/test','App\Http\Controllers\SanphamController@test');
        Route::post('/post_login','App\Http\Controllers\SanphamController@post_login');
        Route::group(['prefix'=>'admin'],function(){
            Route::get('/','App\Http\Controllers\SanphamController@trangchu');
            
        });
        Route::group(['prefix'=>'danhmucsanpham'],function(){
            Route::get('/getlist','App\Http\Controllers\SanphamController@getlist');
            Route::post('/post_sanpham','App\Http\Controllers\SanphamController@post_sanpham');
            
        });
/* admin */