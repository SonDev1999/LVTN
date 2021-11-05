<?php

namespace App\Http\Controllers;
use App\Models\User;
/* use App\Models\sanpham; */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class user_controller extends Controller
{
    //
    public function test(){
        echo "a";
        $user = User::all();
        print_r($user);
    }
    public function trangchu(){
        return view('admin/trangchu');
    }
    public function login(){
        return view('admin/login');
    }
    public function post_login(Request $request){
        
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            echo "1";
        }
        else echo "2";
    }
}
