<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;
use App\Models\loaisp;
use App\Models\sanpham;

class LoaiSanPhamController extends Controller
{
    public function getList(){
        $loaisp = loaisp::all();
        return view('admin/loaisanpham/getlist',compact('loaisp'));
    }
    public function getThem(){
        return view('admin/loaisanpham/them');
    }
    public function postThem(Request $request){
        $this -> validate($request,
        [
            'tenloai'  => 'required|unique:loaisp,loaisp_ten',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'unique'   => 'Dữ liệu không được trùng!',
        ]);
        $loaisp = new loaisp;
        $loaisp->loaisp_ten = $request->tenloai;
        $loaisp->save();
        return redirect('admin/danhmucloaisanpham/getList')->with(['aler'=>'thêm thành công','alername'=>'success']);
    }
    public function getXoa($id){
        $sanpham = sanpham::where('id_loaisp',$id)->first();
        if(empty($sanpham)){
            DB::table('loaisp')->where('id',$id)->delete();
            return redirect('admin/danhmucloaisanpham/getList')->with(['aler'=>'Xóa thành công','alername'=>'success']);
        }
        return redirect('admin/danhmucloaisanpham/getList')->with(['aler'=>'SQLSTATE [23000]: Vi phạm ràng buộc toàn vẹn','alername'=>'danger']);
    }
    public function getSua($id){
        $loaisp = loaisp::where('id',$id)->first();
        return view('admin/loaisanpham/sua',compact('loaisp'));

    }
    public function postSua(Request $request){
        $id = $request->id;
        $this -> validate($request,
        [
            'tenloai'  => 'required|unique:loaisp,loaisp_ten',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'unique'   => 'Dữ liệu không được trùng!',
        ]);
        $loaisp = loaisp::find($id);
        $loaisp->loaisp_ten = $request->tenloai;
        $loaisp->save();
        
        return redirect('admin/danhmucloaisanpham/getList')->with(['aler'=>'sửa thành công','alername'=>'success']);
    }
}
