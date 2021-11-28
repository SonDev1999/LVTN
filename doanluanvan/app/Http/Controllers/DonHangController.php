<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\baohanhsp;

use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function getDSDHChoDuyet(){
        $donhang = donhang::where('id_tinhtrangdh',0)->get();
        return view('admin/donhang/getlist',compact('donhang'))->with(['nametable'=>'danh sách chờ duyệt đơn hàng']);
    }
    public function getDSDHChoGiao(){
        $donhang = donhang::where('id_tinhtrangdh',1)->get();
        return view('admin/donhang/getlist',compact('donhang'))->with(['nametable'=>'danh sách chờ giao hàng']);

    }
    public function getDSDHBiHuy(){
        $donhang = donhang::where('id_tinhtrangdh',3)->get();
        return view('admin/donhang/getlist',compact('donhang'))->with(['nametable'=>'danh sách đơn hàng bị hủy']);
    }
    public function getDSDHDaGiao(){
        $donhang = donhang::where('id_tinhtrangdh',2)->get();
        return view('admin/donhang/getlist',compact('donhang'))->with(['nametable'=>'danh sách đơn hàng đã giao thành công']);
    }
    public function getCTDH($id){
        $chitietdonhang = DB::table('chitietdonhang')
        ->where('id_donhang', $id)
            ->join('sanpham','sanpham.id','=','chitietdonhang.id_sanpham')
            ->select('chitietdonhang.*','sanpham_ten')
            ->get();
            /* print_r($chitietdonhang) ;
            echo "</br>";
            exit; */
        return view('admin/donhang/getlistct',compact('chitietdonhang'));
    }
    public function getDuyetDH($id){
        $donhang = donhang::find($id);
        if($donhang->id_tinhtrangdh == 0){
            $donhang->id_tinhtrangdh = 1;
            $donhang->save();
            return redirect('admin/danhmucdonhang/getDSDHChoDuyet')->with(['aler'=>'duyệt đơn hàng thành công','alername'=>'success']);
        }elseif($donhang->id_tinhtrangdh == 1){
            $donhang->id_tinhtrangdh =2;
            $donhang->save();
            return redirect('admin/danhmucdonhang/getDSDHChoGiao')->with(['aler'=>'duyệt đơn hàng thành công','alername'=>'success']);
        }
        
    }
    public function getXoaDH($id){
        /* $donhang = donhang::where('id',$id)->first();
        $id_tinhtrangdh = $donhang->id_tinhtrangdh; */
        $chitietdonhang = chitietdonhang::where('id_donhang',$id)->get();
        
        foreach($chitietdonhang as $val){
            $baohanhsp = baohanhsp::where('id_chitietdonhang',$val->id)->delete();
        }
        $chitietdonhang = chitietdonhang::where('id_donhang',$id)->delete();
        $donhang = donhang::where('id',$id)->delete();
        /* if($id_tinhtrangdh == 0){
            return redirect('admin/danhmucdonhang/getDSDHChoDuyet')->with(['aler'=>'Xóa đơn hàng thành công','alername'=>'success']);
        }else{
            return redirect('admin/danhmucdonhang/getDSDHChoGiao')->with(['aler'=>'Xóa đơn hàng thành công','alername'=>'success']);
        } */
        return redirect('admin/danhmucdonhang/getDSDHChoDuyet')->with(['aler'=>'Xóa đơn hàng thành công','alername'=>'success']);
        
    }
    public function getHuyDH($id){
        $donhang = donhang::find($id);
        if($donhang->id_tinhtrangdh == 1){
            $donhang->id_tinhtrangdh = 3;
            $donhang->save();
            return redirect('admin/danhmucdonhang/getDSDHChoGiao')->with(['aler'=>'Hủy đơn hàng thành công','alername'=>'success']);
        }/* elseif($donhang->id_tinhtrangdh == 1){
            $donhang->id_tinhtrangdh =2;
            $donhang->save();
            return redirect('admin/danhmucdonhang/getDSDHChoGiao')->with(['aler'=>'duyệt đơn hàng thành công','alername'=>'success']);
        } */
        
    }
}
