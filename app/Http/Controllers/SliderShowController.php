<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\slidershow;

class SliderShowController extends Controller
{
    public function getList(){
        $slidershow = slidershow::all();
        return view('admin/slidershow/getlist',compact('slidershow'));
    }
    public function getThem(){
        return view('admin/slidershow/them');
    }
    public function postThem(Request $request){
        $this -> validate($request,
        [
            'hinhanh' => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
        ]);
        $filename=$request->file('hinhanh')->getClientOriginalName();
        $request->file('hinhanh')->move(
            base_path() . '/public/images/slidershow/', $filename
        );
        $slidershow = new slidershow;
        $slidershow->slider_hinh_anh = $filename;
        $slidershow->save();
        return redirect('admin/danhmucslidershow/getList')->with(['aler'=>'thêm thành công','alername'=>'success']);
    }
    public function getXoa($id){
        $slidershow = slidershow::where('id',$id)->first();
        $img_current = '/public/images/slidershow/'. $slidershow->slidershow_hinh_anh;
        File::delete($img_current);
        $slidershow = slidershow::where('id',$id)->delete();
        return redirect('admin/danhmucslidershow/getList')->with(['aler'=>'xóa thành công','alername'=>'success']);
    }
    public function getSua($id){
        $slidershow = slidershow::where('id',$id)->first();
        return view('admin/slidershow/sua',compact('slidershow'));
    }
    public function postSua(Request $request){
        $id = $request->id;
        $slidershow = slidershow::find($id);
        $img_current = '/public/images/slidershow/'. $request->img_current;
        if($request->hinhanh !=""){
            $filename = $request->file('hinhanh')->getClientOriginalName();
            $slidershow->slider_hinh_anh = $filename;
            $request->file('hinhanh')->move(
                base_path() . '/public/images/slidershow/', $filename
            );
            File::delete($img_current);
        }
        $slidershow->save();
        return redirect('admin/danhmucslidershow/getList')->with(['aler'=>'sửa thành công','alername'=>'success']);
    }

}
