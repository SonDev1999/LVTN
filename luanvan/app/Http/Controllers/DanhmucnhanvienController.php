<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use Illuminate\Http\Request;

class DanhmucnhanvienController extends Controller
{
    public function test(){
        $nhanvien = nhanvien::all();
        echo $nhanvien;
    }
}
