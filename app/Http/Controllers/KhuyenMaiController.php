<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;
use App\Models\khuyenmai;
use App\Models\sanpham;

class KhuyenMaiController extends Controller
{
    public function getList(){
        $khuyenmai = khuyenmai::all();
        return view('admin/khuyenmai/getlist',compact('khuyenmai'));
    }
    public function getThem(){
        return view('admin/khuyenmai/them');
    }
    public function postThem(Request $request){
        $this -> validate($request,
        [
            'tenkm'  => 'required',
            'loaikm' => 'required',
            'giakm'  => 'required|integer',
            'ngaybatdau'  => 'required|after_or_equal:today',
            'ngayketthuc' => 'required|after_or_equal:today',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'integer'     => 'Dữ liệu nhập phải là số',
            'after_or_equal' => 'ngày phải lớn hơn ngày hiện hành hôm nay',
        ]);
        $khuyenmai = new khuyenmai;
        $khuyenmai->khuyenmai_ten = $request->tenkm;
        $khuyenmai->khuyenmai_loai = $request->loaikm;
        $khuyenmai->khuyenmai_gia_tri = $request->giakm;
        $khuyenmai->khuyenmai_ngay_bat_dau = $request->ngaybatdau;
        $khuyenmai->khuyenmai_ngay_ket_thuc = $request->ngayketthuc;
        $khuyenmai->save();
        return redirect('admin/danhmuckhuyenmai/getList')->with(['aler'=>'thêm thành công','alername'=>'success']);
    }
    public function getXoa($id){
        $sanpham = sanpham::where('id_khuyenmai',$id)->first();
        if(empty($sanpham)){
            DB::table('khuyenmai')->where('id',$id)->delete();
            return redirect('admin/danhmuckhuyenmai/getList')->with(['aler'=>'Xóa thành công','alername'=>'success']);
        }
        return redirect('admin/danhmuckhuyenmai/getList')->with(['aler'=>'SQLSTATE [23000]: Vi phạm ràng buộc toàn vẹn','alername'=>'danger']);
    }
    public function getSua($id){
        $khuyenmai = khuyenmai::where('id',$id)->first();
        return view('admin/khuyenmai/sua',compact('khuyenmai'));

    }
    public function postSua(Request $request){
        $id = $request->id;
        $this -> validate($request,
        [
            'tenkm'  => 'required',
            'loaikm' => 'required',
            'giatri'  => 'required|integer',
            'ngaybatdau'  => 'required|after_or_equal:today',
            'ngayketthuc' => 'required|after_or_equal:today',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'integer'     => 'Dữ liệu nhập phải là số',
            'after_or_equal' => 'ngày phải lớn hơn ngày hiện hành hôm nay',
        ]);
        $khuyenmai = khuyenmai::find($id);
        $khuyenmai->khuyenmai_ten = $request->tenkm;
        $khuyenmai->khuyenmai_loai = $request->loaikm;
        $khuyenmai->khuyenmai_gia_tri = $request->giatri;
        $khuyenmai->khuyenmai_ngay_bat_dau = $request->ngaybatdau;
        $khuyenmai->khuyenmai_ngay_ket_thuc = $request->ngayketthuc;
        $khuyenmai->save();
        
        return redirect('admin/danhmuckhuyenmai/getList')->with(['aler'=>'sửa thành công','alername'=>'success']);
    }
}
