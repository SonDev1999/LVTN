<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\loaisp;
use Illuminate\Support\Facades\View;
class shoppingController extends Controller
{
    public function __construct(){
        $loaisanpham=loaisp::all();
        View::share('loaisanpham',$loaisanpham);
     }
    public function themsp(Request $request,$id){
        $sanpham=sanpham::select('sanpham_ten','id','sanpham_gia','sanpham_hinhanh')->find($id);
        if(!$sanpham) return readdir('/'); 
        \Cart::add([
            'id'=>$id,
            'name'=>$sanpham->sanpham_ten,
            'qty'=>1,
            'price'=>$sanpham->sanpham_gia,
            'options'=>['avatar'=>$sanpham->sanpham_hinhanh]
        ]);
        return redirect()->back();
    }
    public function getlistshopping(){
        $sanpham=\Cart::content();
        return view('shopping.index',compact('sanpham'));
    }
}
