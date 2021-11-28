<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\loaisp;
use App\Models\sanpham;

class FrontendController extends Controller
{
    public function __construct(){
       $loaisanpham=loaisp::all();
       View::share('loaisanpham',$loaisanpham);
    }
    public function getListProduct(Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        echo $url;
        exit;
        if($id=array_pop($url)){
            $sanpham=sanpham::where([
                'id_loaisp'=>$id
            ])->orderBy('id','DESC')->paginate(10);
            $loai= loaisp::find($id);
            $viewData=[
                'sanpham'=>$sanpham,
                'loai'=>$loai
               
            ];
            return view('product.index',$viewData);
        }
        return redirect('/');
    }
    public function productDetail(Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id=array_pop($url)){
           
            $productDetail =sanpham::find($id);
            $viewSP=[
                'productDetail'=>$productDetail
            ];
            return view('product.detail',$viewSP);
        }
        return redirect('/');
    }
//    function loaisanpham($id){
//        $loaisanpham =loaisanpham::find($id);
//        $sanpham=sanpham::where('id_loai',$id);
//        return view('product.index',['loaisanpham'=>$loaisanpham,'sanpham'=>$sanpham]);
//    }

}
