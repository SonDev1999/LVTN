<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
class muahangController extends Controller
{
    public function themsp(Request $request,$id){
        $sanpham=sanpham::select('sanpham_ten','id','sanpham_gia')->find($id);
        if(!$sanpham) return readdir('/'); 
        \Cart::add([
            'id'=>$id,
            'name'=>$sanpham->sanpham_ten,
            'qty'=>1,
            'gia'=>$sanpham->sanpham_gia,
            'options'=>['hinh'=>$sanpham->sanpham_hinhanh]
        ]);
        return readdir()->back();
    }
}
