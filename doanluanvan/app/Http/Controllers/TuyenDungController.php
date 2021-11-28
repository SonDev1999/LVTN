<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;
use App\Models\tuyendung;

class TuyenDungController extends Controller
{
    public function getList(){
        $tuyendung = tuyendung::all();
        return view('admin/tuyendung/getlist',compact('tuyendung'));
    }
    public function getThem(){
        return view('admin/tuyendung/them');
    }
    public function postThem(Request $request){
        $this -> validate($request,
        [
            'tieude'  => 'required',
            'hinhanh' => 'required',
            'lienhe'  => 'required|integer',
            'thoigian'  => 'required',
            'tinhtrang' => 'required|integer',
            'mota' => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'integer'     => 'Dữ liệu nhập phải là số',
        ]);
        $filename=$request->file('hinhanh')->getClientOriginalName();
        $request->file('hinhanh')->move(
            base_path() . '/public/images/tuyendung/', $filename
        );
        $tuyendung = new tuyendung;
        $tuyendung->tuyendung_tieu_de = $request->tieude;
        $tuyendung->tuyendung_anh = $filename;
        $tuyendung->tuyendung_mo_ta = $request->mota;
        $tuyendung->tuyendung_lien_he = $request->lienhe;
        $tuyendung->tuyendung_thoi_gian = $request->thoigian;
        $tuyendung->tuyendung_tinh_trang = $request->tinhtrang;
        $tuyendung->save();
        return redirect('admin/danhmuctuyendung/getList')->with(['aler'=>'thêm tuyển dụng thành công','alername'=>'success']);
    }
    public function getXoa($id){
        DB::table('tuyendung')->where('id',$id)->delete();
        return redirect('admin/danhmuctuyendung/getList')->with(['aler'=>'Xóa tuyển dụng thành công','alername'=>'success']);
    }
    public function getSua($id){
        $tuyendung = tuyendung::where('id',$id)->first();
        return view('admin/tuyendung/sua',compact('tuyendung'));

    }
    public function postSua(Request $request){
        /* echo "<pre>";
        print_r($request->all()) ;
        echo "</pre>";
        echo $request->file('hinhanh')->getClientOriginalName();
        exit; */
        $id = $request->id;
        $this -> validate($request,
        [
            'tieude'  => 'required',
            'lienhe'  => 'required|integer',
            'thoigian'  => 'required',
            'tinhtrang' => 'required|integer',
            'mota' => 'required',
        ],
        [
            
            'required'   => 'Vui lòng không để trống các trường!',
            'integer'     => 'Dữ liệu nhập phải là số',
        ]);
        

        $tuyendung = tuyendung::find($id);
        $tuyendung->tuyendung_tieu_de = $request->tieude;
        $tuyendung->tuyendung_mo_ta = $request->mota;
        $tuyendung->tuyendung_lien_he = $request->lienhe;
        $tuyendung->tuyendung_thoi_gian = $request->thoigian;
        $tuyendung->tuyendung_tinh_trang = $request->tinhtrang;

        $img_current = '/public/images/tuyendung/'. $request->img_current;
        if($request->hinhanh !=""){
            $filename = $request->file('hinhanh')->getClientOriginalName();
            $tuyendung->tuyendung_anh = $filename;
            $request->file('hinhanh')->move(
                base_path() . '/public/images/tuyendung/', $filename
            );
            File::delete($img_current);
        }
        $tuyendung->save();
        return redirect('admin/danhmuctuyendung/getList')->with(['aler'=>'sửa thành công','alername'=>'success']);
    }
}
