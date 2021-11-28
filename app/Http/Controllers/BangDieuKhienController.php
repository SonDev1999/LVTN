<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BangDieuKhienController extends Controller
{
    public function getBangDieuKhien(){
        return view('admin/bangdieukhien');
    }
}
