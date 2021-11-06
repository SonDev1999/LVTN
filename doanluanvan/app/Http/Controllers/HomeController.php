<?php

namespace App\Http\Controllers;
use App\Models\sanpham;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $productHot=sanpham::all();
        $viewData=[
            'productHot'=>$productHot
        ];
        return view('home.index',$viewData);
    }
    public function gioithieu(){
        return view('home.gioithieu');
    }
    public function lienhe(){
        return view('home.lienhe');
    }
}
