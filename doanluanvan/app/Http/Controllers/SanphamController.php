<?php

namespace App\Http\Controllers;

use App\Http\Requests\addsanpham;
use App\Models\hinhsanpham;
use App\Models\User;
/* use App\Models\sanpham; */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\loaisp;
use App\Models\nhasanxuat;
use App\Models\khuyenmai;
use App\Models\sanpham;

class SanphamController extends Controller
{
    //
    public function getlist(){
        $sanpham = DB::table('sanpham')
            ->leftjoin('loaisp','loaisp.id','=','sanpham.id_loaisp')
            ->get();

        $loaisp = loaisp::all();
        $nhasanxuat = nhasanxuat::all();
        $khuyenmai = khuyenmai::all();
        /* echo "<pre>";
        print_r($sanpham);
        echo "</pre>";
        exit; */

        return view('admin.sanpham.getlist',compact('sanpham','loaisp','nhasanxuat','khuyenmai'));
    }

    public function getSanPham(){
        $loaisp = loaisp::all();
        $nhasanxuat = nhasanxuat::all();
        $khuyenmai = khuyenmai::all();
        return view('admin.sanpham.addsanpham',compact('loaisp','nhasanxuat','khuyenmai'));
    }

    public function postSanPham(Request $request){
        $loaisp = loaisp::where('loaisp_ten',$request->hang)->first();
        $nhasanxuat = nhasanxuat::where('nhasanxuat_ten',$request->nhasanxuat)->first();
        $khuyenmai = khuyenmai::where('khuyenmai_ten',$request->khuyenmai)->first();

        $this -> validate($request,
        [
            'tensanpham'  => 'required',
            'thoigianbaohanh' => 'required',
            'gia'  => 'required|integer',
            'trangthai'  => 'required|integer',
            'mau' => 'required',
            'dungluong' => 'required|',
            'soluong' => 'required|integer',
            'hinhanh' => 'required',
            'mota' => 'required',
            'txtimg1' => 'required',
            'txtimg2' => 'required',
            'txtimg3' => 'required',
            'txtimg4' => 'required',
            'txtimg5' => 'required',
            'txtimg6' => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'integer'     => 'Dữ liệu nhập phải là số',
        ]);
        $file = $request->all();
        $filename=$request->file('hinhanh')->getClientOriginalName();
        $request->file('hinhanh')->move(
            base_path() . '/public/images/product/', $filename
        );
        $sanpham = new sanpham;
        $sanpham->sanpham_ten = $request->tensanpham;
        $sanpham->sanpham_thoi_gian_bao_hanh = $request->thoigianbaohanh;
        $sanpham->sanpham_mo_ta = $request->mota;
        $sanpham->sanpham_hinhanh = $filename;
        $sanpham->sanpham_gia = $request->gia;
        $sanpham->sanpham_trang_thai = $request->trangthai;
        $sanpham->sanpham_luot_xem = 0;
        $sanpham->sanpham_so_luong = $request->soluong;
        $sanpham->sanpham_mau = $request->mau;
        $sanpham->sanpham_dung_luong = $request->dungluong;
        $sanpham->sanpham_noi_bat = $request->noibat;
        $sanpham->id_nhasanxuat = $nhasanxuat->id_nhasanxuat;
        $sanpham->id_khuyenmai = $khuyenmai->id_khuyenmai;
        $sanpham->id_loaisp = $loaisp->id;
        $sanpham->save();

        
        $files = [];
        $files[] = $request->txtimg1;
        $files[] = $request->txtimg2;
        $files[] = $request->txtimg3;
        $files[] = $request->txtimg4;
        $files[] = $request->txtimg5;
        $files[] = $request->txtimg6;
        foreach($files as $file){
            $filename=$file->getClientOriginalName();
            $file->move(
                base_path().'/public/images/product-details/', $filename
            );
            $hinhsanpham = new hinhsanpham();
            $hinhsanpham->id_sanpham = $sanpham->id;
            $hinhsanpham->hinhsanpham_ten = $filename;
            $hinhsanpham->save();
        }
        
        return redirect('danhmucsanpham/getlist')->with(['aler'=>'thêm sản phẩm thành công','alername'=>'success']);
    }

    public function getXoaSP($id){
        
        $donhang = DB::table('chitietdonhang')->where('id_sanpham',$id)->get();
        if($donhang == ""){
            return redirect('danhmucsanpham/getlist')->with(['aler'=>'xóa sản phẩm thất bại: sản phẩm đang thuộc trong đơn hàng của khách hàng','alername'=>'danger']);
        }
        
        $binhluan = DB::table('binhluan')->where('id_sanpham',$id)->get();
        foreach ($binhluan as $val) {
            DB::table('binhluan')->where('id_sanpham',$id)->delete();
        }
        $hinhsanpham = DB::table('hinhsanpham')->where('id_sanpham',$id)->get();
        foreach ($hinhsanpham as $val) {
            $image = '/public/images/product-details/'.$val->hinhsanpham_ten;
            File::delete($image);
            DB::table('hinhsanpham')->where('id_sanpham',$id)->delete();
        }
        $sanpham = DB::table('sanpham')->where('id_sanpham',$id)->first();
        $img = '/public/images/product/'.$sanpham->sanpham_hinhanh;
        File::delete($img);
        DB::table('sanpham')->where('id_sanpham',$id)->delete();

        return redirect('danhmucsanpham/getlist')->with(['aler'=>'xóa sản phẩm thành công','alername'=>'success']);
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
