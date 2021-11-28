<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;
use App\Models\nhasanxuat;
use App\Models\sanpham;

class NhaSanXuatController extends Controller
{
    public function getList(){
        $nhasanxuat = nhasanxuat::all();
        return view('admin/NhaSanXuat/getlist',compact('nhasanxuat'));
    }
    public function getThem(){
        return view('admin/NhaSanXuat/them');
    }
    public function postThem(Request $request){
        $this -> validate($request,
        [
            'tennhasanxuat'  => 'required|unique:nhasanxuat,nhasanxuat_ten',
            'chitiet'  => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'unique'   => 'Dữ liệu không được trùng!',
        ]);
        $nhasanxuat = new nhasanxuat;
        $nhasanxuat->nhasanxuat_ten = $request->tennhasanxuat;
        $nhasanxuat->nhasanxuat_chi_tiet = $request->chitiet;
        $nhasanxuat->save();
        return redirect('admin/danhmucnhasanxuat/getList')->with(['aler'=>'thêm thành công','alername'=>'success']);
    }
    public function getXoa($id){
        $sanpham = sanpham::where('id_nhasanxuat',$id)->first();
        if(empty($sanpham)){
            DB::table('nhasanxuat')->where('id',$id)->delete();
            return redirect('admin/danhmucnhasanxuat/getList')->with(['aler'=>'Xóa thành công','alername'=>'success']);
        }
        return redirect('admin/danhmucnhasanxuat/getList')->with(['aler'=>'SQLSTATE [23000]: Vi phạm ràng buộc toàn vẹn','alername'=>'danger']);
    }
    public function getSua($id){
        $nhasanxuat = nhasanxuat::where('id',$id)->first();
        return view('admin/NhaSanXuat/sua',compact('nhasanxuat'));

    }
    public function postSua(Request $request){
        $id = $request->id;
        $this -> validate($request,
        [
            'tennhasanxuat'  => 'required|unique:nhasanxuat,nhasanxuat_ten',
            'chitiet'  => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'unique'   => 'Dữ liệu không được trùng!',
        ]);
        $nhasanxuat = nhasanxuat::find($id);
        $nhasanxuat->nhasanxuat_ten = $request->tennhasanxuat;
        $nhasanxuat->nhasanxuat_chi_tiet = $request->chitiet;
        $nhasanxuat->save();
        
        return redirect('admin/danhmucnhasanxuat/getList')->with(['aler'=>'sửa thành công','alername'=>'success']);
    }
}
