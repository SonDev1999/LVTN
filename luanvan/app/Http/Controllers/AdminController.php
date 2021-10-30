<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
class AdminController extends Controller
{
    public function trangchu(){
        return view('admin/trangchu');
    }
    public function login(){
        return view('admin/login');
    }
    public function post_login(Request $request){
        
        $email = $request->email;
        $password = Hash::make($request->password);
        if(Auth::attempt(['nhanvien_email' => $email, 'nhanvien_mat_khau' => $password])){
            echo "1";
        }
        else echo "2";
    }
}
