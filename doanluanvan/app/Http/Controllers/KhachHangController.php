<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\khachhang;
use App\Models\User;


class KhachHangController extends Controller
{
    public function getlist(){
        $khachhang = DB::table('users')
            ->join('khachhang','khachhang.id_user','=','users.id')
            ->select('khachhang.*','email','password','users_trang_thai','id_loainguoidung')
            ->get();

        
        return view('admin/khachhang/getlist',compact('khachhang'));
    }
    public function getmotk($id){
        $khachhang = khachhang::where('id',$id)->first();
        $users = User::find($khachhang->id_user);
        $users->users_trang_thai = 1;
        $users->save();
        return redirect(route('listKhachHang'))->with(['aler'=>'mở tài khoản thành công','alername'=>'success']);
    }
    public function getkhoatk($id){
        $khachhang = khachhang::where('id',$id)->first();
        $users = User::find($khachhang->id_user);
        $users->users_trang_thai = 0;
        $users->save();
        return redirect(route('listKhachHang'))->with(['aler'=>'khóa tài khoản thành công','alername'=>'success']);
    }

    public function getXoa($id){
        
        $donhang = DB::table('donhang')->where('id_khachhang',$id)->first();
        if($donhang != ""){
            return redirect(route('listKhachHang'))->with(['aler'=>'SQLSTATE [23000]: Vi phạm ràng buộc toàn vẹn','alername'=>'danger']);
        }
        $khachhang = khachhang::where('id',$id)->first();
        $user = User::where('id',$khachhang->id_user)->first();
        $khachhang->delete();
        $user->delete();
        return redirect(route('listKhachHang'))->with(['aler'=>'Xóa Khách Hàng Thành Công','alername'=>'success']);
    }
}
