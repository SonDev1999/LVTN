<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table = "sanpham";
    public $timestamps = false;
    public function loaisanpham(){
        return $this->belongaTo('App\Model\loaisanpham','id_loai','id');
    }
}
