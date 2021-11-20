<?php

namespace App\Http\Controllers;

use App\Http\Requests\addsanpham;
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
use App\Models\hinhsanpham;

class SanphamController extends Controller
{
    //
    public function getlist(){
        $sanpham = DB::table('sanpham')
            ->join('loaisp','loaisp.id','=','sanpham.id_loaisp')
            ->select('sanpham.*','loaisp_ten')
            ->get();
        /* $sanpham = DB::table('loaisp')
        ->join('sanpham','sanpham.id_loaisp','=','loaisp.id')
        ->get(); */
        /* echo "<pre>";
        print_r($loaisp);
        echo "</pre>";
        exit; */
        $loaisp = loaisp::all();
        $nhasanxuat = nhasanxuat::all();
        $khuyenmai = khuyenmai::all();
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
        $sanpham->id_nhasanxuat = $nhasanxuat->id;
        $sanpham->id_khuyenmai = $khuyenmai->id;
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
        
        return redirect('admin/danhmucsanpham/getlist')->with(['aler'=>'thêm sản phẩm thành công','alername'=>'success']);
    }

    public function getXoaSP($id){
        
        $donhang = DB::table('chitietdonhang')->where('id_sanpham',$id)->get();
        if($donhang == ""){
            return redirect('admin/danhmucsanpham/getlist')->with(['aler'=>'xóa sản phẩm thất bại: sản phẩm đang thuộc trong đơn hàng của khách hàng','alername'=>'danger']);
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
        $sanpham = DB::table('sanpham')->where('id',$id)->first();
        $img = '/public/images/product/'.$sanpham->sanpham_hinhanh;
        File::delete($img);
        DB::table('sanpham')->where('id',$id)->delete();

        return redirect('admin/danhmucsanpham/getlist')->with(['aler'=>'xóa sản phẩm thành công','alername'=>'success']);
    }
    public function getSuaSP($id){
            $sanpham = DB::table('sanpham')
            ->where('sanpham.id',$id)
            ->join('loaisp','id_loaisp','=','loaisp.id')
            ->select('sanpham.*','loaisp_ten')
            ->get();
            
            /* $sanpham = DB::table('loaisp')
            ->where('loaisp.id',$id)
            ->join('sanpham','sanpham.id_loaisp','=','loaisp.id')
            ->get(); */
            /* echo $sanpham;
            exit; */
        $loaisp = loaisp::all();
        $nhasanxuat = nhasanxuat::all();
        $khuyenmai = khuyenmai::all();
        $hinhsanpham = hinhsanpham::where('id_sanpham',$id)->get();
        return view('admin.sanpham.getsuasanpham',compact('sanpham','loaisp','nhasanxuat','khuyenmai','hinhsanpham'));

    }

    public function postSuaSanPham(Request $request){
        $id = $request->idsanpham;
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
            'mota' => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'integer'     => 'Dữ liệu nhập phải là số',
        ]);
        $sanpham = sanpham::findOrFail($id);
        $sanpham->sanpham_ten = $request->tensanpham;
        $sanpham->sanpham_thoi_gian_bao_hanh = $request->thoigianbaohanh;
        $sanpham->sanpham_mo_ta = $request->mota;
        $sanpham->sanpham_gia = $request->gia;
        $sanpham->sanpham_trang_thai = $request->trangthai;
        $sanpham->sanpham_so_luong = $request->soluong;
        $sanpham->sanpham_mau = $request->mau;
        $sanpham->sanpham_dung_luong = $request->dungluong;
        $sanpham->sanpham_noi_bat = $request->noibat;
        $sanpham->id_nhasanxuat = $nhasanxuat->id;
        $sanpham->id_khuyenmai = $khuyenmai->id;
        $sanpham->id_loaisp = $loaisp->id;
        $img_current = '/public/images/product/'. $request->img_current;
        if($request->hinhanh !=""){
            $filename = $request->file('hinhanh')->getClientOriginalName();
            $sanpham->sanpham_hinhanh = $filename;
            $request->file('hinhanh')->move(
                base_path() . '/public/images/product/', $filename
            );
            File::delete($img_current);
        }
        
        $sanpham->save();

        
        $files = [];
        $files[] = $request->txtimg1;
        $files[] = $request->txtimg2;
        $files[] = $request->txtimg3;
        $files[] = $request->txtimg4;
        $files[] = $request->txtimg5;
        $files[] = $request->txtimg6;

        $bien = 0;
        foreach($files as $file){
            if($file != ""){
                $bien = 1;
            }
        }
        if($bien == 1){
            $hinhsanpham = hinhsanpham::where('id_sanpham',$id)->get();
            foreach($hinhsanpham as $hinhsp){
                $img = '/public/images/product-details/'.$hinhsp->hinhsanpham_ten;
                File::delete($img);
                DB::table('hinhsanpham')->where('id',$hinhsp->id_hinhsanpham)->delete();
            }
        }
        
        foreach($files as $file){
            if($file != ""){
                $filename=$file->getClientOriginalName();
                $file->move(
                    base_path().'/public/images/product-details/', $filename
                );
                $hinhsanpham = new hinhsanpham();
                $hinhsanpham->id_sanpham = $id;
                $hinhsanpham->hinhsanpham_ten = $filename;
                $hinhsanpham->save();
            }
        }
        return redirect('admin/danhmucsanpham/getlist')->with(['aler'=>'sửa sản phẩm thành công','alername'=>'success']);
    }





   /*  public function trangchu(){
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
    } */
}
