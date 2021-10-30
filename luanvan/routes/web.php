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

Route::get('/', function () {
    return view('home.index');
});
Route::get('/product-details', function () {
    return view('product.detail');
});

// route backend
    Route::get('/login','App\Http\Controllers\AdminController@login');
    Route::post('/post_login','App\Http\Controllers\AdminController@post_login');
    Route::group(['prefix'=>'admin'],function(){
        Route::get('/','App\Http\Controllers\AdminController@trangchu');
        
    });

    Route::get('users/{id}', function ($id) {
        
    });
    Route::get('/test','App\Http\Controllers\DanhmucnhanvienController@test');
// route backend