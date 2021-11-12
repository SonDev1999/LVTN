<?php

namespace App\Http\Controllers;
use App\Models\User;
/* use App\Models\sanpham; */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\loaisp;
use App\Models\nhasanxuat;
use App\Models\khuyenmai;
class SanphamController extends Controller
{
    //
    public function getlist(){
        $sanpham = DB::table('sanpham')
            ->join('loaisp','loaisp.id_loaisp','=','sanpham.id_loaisp')
            ->get();

        $loaisp = loaisp::all();
        $nhasanxuat = nhasanxuat::all();
        $khuyenmai = khuyenmai::all();

        return view('admin.sanpham.getlist',compact('sanpham','loaisp','nhasanxuat','khuyenmai'));
    }
    public function post_sanpham(){
        return view('admin/sanpham/getlist');
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
