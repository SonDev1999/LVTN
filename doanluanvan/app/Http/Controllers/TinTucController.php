<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\tintuc;


class TinTucController extends Controller
{
    public function getList(){
        $tintuc = tintuc::all();
        return view('admin/tintuc/getlist',compact('tintuc'));
    }
    public function getThem(){
        return view('admin/tintuc/them');
    }
    public function postThem(Request $request){
        $this -> validate($request,
        [
            'tieude'  => 'required',
            'hinhanh' => 'required',
            'noidung'  => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
        ]);
        $filename=$request->file('hinhanh')->getClientOriginalName();
        $request->file('hinhanh')->move(
            base_path() . '/public/images/tintuc/', $filename
        );
        $tintuc = new tintuc;
        $tintuc->tintuc_tieu_de = $request->tieude;
        $tintuc->tintuc_hinh_anh = $filename;
        $tintuc->tintuc_noi_dung = $request->noidung;
        $tintuc->save();
        return redirect('admin/danhmuctintuc/getList')->with(['aler'=>'thêm thành công','alername'=>'success']);
    }
    public function getXoa($id){
        $tintuc = tintuc::where('id',$id)->first();
        $img_current = '/public/images/tintuc/'. $tintuc->tintuc_hinh_anh;
        File::delete($img_current);
        $tintuc = tintuc::where('id',$id)->delete();
        return redirect('admin/danhmuctintuc/getList')->with(['aler'=>'xóa thành công','alername'=>'success']);
    }
    public function getSua($id){
        $tintuc = tintuc::where('id',$id)->first();
        return view('admin/tintuc/sua',compact('tintuc'));
    }
    public function postSua(Request $request){
        $id = $request->id;
        $tintuc = tintuc::find($id);
        $tintuc->tintuc_tieu_de = $request->tieude;
        $tintuc->tintuc_noi_dung = $request->noidung;
        $img_current = '/public/images/tintuc/'. $request->img_current;
        if($request->hinhanh !=""){
            $filename = $request->file('hinhanh')->getClientOriginalName();
            $tintuc->tintuc_hinh_anh = $filename;
            $request->file('hinhanh')->move(
                base_path() . '/public/images/tintuc/', $filename
            );
            File::delete($img_current);
        }
        $tintuc->save();
        return redirect('admin/danhmuctintuc/getList')->with(['aler'=>'sửa thành công','alername'=>'success']);
    }

}
