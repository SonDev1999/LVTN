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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* admin */
    Route::get('/login','App\Http\Controllers\user_controller@login');
        Route::post('/post_login','App\Http\Controllers\user_controller@post_login');
        Route::group(['prefix'=>'admin'],function(){
            Route::get('/','App\Http\Controllers\user_controller@trangchu');
            
        });
/* admin */