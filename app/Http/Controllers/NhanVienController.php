<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\nhanvien;
use App\Models\User;
use App\Models\khuyenmai;
use App\Models\sanpham;
use App\Models\hinhsanpham;
use App\Models\loaisp;
use App\Models\nhasanxuat;


class NhanVienController extends Controller
{
    public function getlist(){
        $nhanvien = DB::table('users')
            ->join('nhanvien','nhanvien.id_user','=','users.id')
            ->select('nhanvien.*','email','password','users_trang_thai','loainguoidung')
            ->get();

        
        return view('admin/nhanvien/getlist',compact('nhanvien'));
    }
    public function getmotk($id){
        $nhanvien = nhanvien::where('id',$id)->first();
        $users = User::find($nhanvien->id_user);
        $users->users_trang_thai = 1;
        $users->save();
        return redirect(route('listNhanVien'))->with(['aler'=>'mở tài khoản thành công','alername'=>'success']);
    }
    public function getkhoatk($id){
        $nhanvien = nhanvien::where('id',$id)->first();
        $users = User::find($nhanvien->id_user);
        $users->users_trang_thai = 0;
        $users->save();
        return redirect(route('listNhanVien'))->with(['aler'=>'khóa tài khoản thành công','alername'=>'success']);
    }

    public function getThem(){
        return view('admin/nhanvien/Them');
    }

    public function postThem(Request $request){
        /* echo "<pre>";
        print_r($request->all()) ;
        echo "</pre>";
        exit; */
        $this -> validate($request,
        [
            'tennhanvien'  => 'required',
            'cccd' => 'required|integer|unique:nhanvien,nhanvien_cccd',
            'sdt'  => 'required|integer',
            'gioitinh'  => 'required',
            'ngayvaolam' => 'required',
            'diachi' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'bophan' => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'integer'     => 'Dữ liệu nhập phải là số',
            'confirmed'     => 'Mật khẩu nhập vào không trùng nhau',
            'email.unique'     => 'Email này đã được đăng kí',
            'cccd.unique'     => 'Số cccd này đã được đăng kí',
            
        ]);
        $matkhau = bcrypt($request->password);
        /* echo "<pre>";
        print_r($matkhau) ;
        echo "</pre>";
        exit; */
        if($request->gioitinh == "Nam") $gioitinh = 0;
        else $gioitinh = 1;
        switch ($request->bophan) {
            case "Admin": $bophan = 2; break;
            case "Nhân Viên": $bophan = 3; break;
            case "Tin Tức": $bophan = 4; break;
            case "Tuyển Dụng": $bophan = 5; break; 
            case "Khuyến Mãi": $bophan = 6; break;
            case "Sản Phẩm": $bophan = 7; break; 
            case "Nhà Sản Xuất": $bophan = 8; break; 
            case "Loại Sản Phẩm": $bophan = 9; break; 
            default: $bophan = 10;
        }
        /* echo "<pre>";
        print_r($bophan) ;
        echo "</pre>";
        exit; */
        $user = new User;
        $user->email = $request->email;
        $user->password = $matkhau;
        $user->users_trang_thai = 1;
        $user->loainguoidung = $bophan;
        $user->save();

        $nhanvien = new nhanvien;
        $nhanvien->nhanvien_ten = $request->tennhanvien;
        $nhanvien->nhanvien_cccd = $request->cccd;
        $nhanvien->nhanvien_sdt = $request->sdt;
        $nhanvien->nhanvien_gioi_tinh = $gioitinh;
        $nhanvien->nhanvien_ngay_vao_lam = $request->ngayvaolam;
        $nhanvien->nhanvien_dia_chi = $request->diachi;
        $nhanvien->id_user = $user->id;
        $nhanvien->save();
        return redirect(route('listNhanVien'))->with(['aler'=>'thêm nhân viên thành công','alername'=>'success']);
    }

    public function getXoa($id){
        $nhanvien = nhanvien::where('id',$id)->first();
        $user = User::where('id',$nhanvien->id_user)->first();
        $nhanvien->delete();
        $user->delete();
        return redirect(route('listNhanVien'))->with(['aler'=>'Xóa Nhân Viên Thành Công','alername'=>'success']);
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
}
