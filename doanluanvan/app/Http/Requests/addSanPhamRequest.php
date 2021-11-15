<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }
    public function rules()
    {
        return [
            'tensanpham'  => 'required|unique:sanpham,sanpham_ten',
            'thoigianbaohanh' => 'required',
            'gia'  => 'required|interger',
            'trangthai'  => 'required',
            'mau' => 'required',
            'dungluong' => 'required|',
            'soluong' => 'required|interger',
            'hinhanh' => 'required|mimes:jpeg,jpg,png',
            'mota' => 'required|mimes:jpeg,jpg,png',
            'txtimg1' => 'required|mimes:jpeg,jpg,png',
            'txtimg2' => 'required|mimes:jpeg,jpg,png',
            'txtimg3' => 'required|mimes:jpeg,jpg,png',
            'txtimg4' => 'required|mimes:jpeg,jpg,png',
            'txtimg5' => 'required|mimes:jpeg,jpg,png',
            'txtimg6' => 'required|mimes:jpeg,jpg,png',
            //
        ];
    }
    public function messages() {
        return [
            'tensanpham.required'  => 'không được để trống',
            'thoigianbaohanh.required' =>'không được để trống',
            'gia.required'  => 'không được để trống',
            'trangthai.required'  => 'không được để trống',
            'mau.required' =>'không được để trống',
            'dungluong.required' =>'không được để trống',
            'soluong.required' =>'không được để trống',
            'hinhanh.required' =>'không được để trống',
            'mota.required' =>'không được để trống',
            'txtimg1.required' =>'không được để trống',
            'txtimg2.required' =>'không được để trống',
            'txtimg3.required' =>'không được để trống',
            'txtimg4.required' =>'không được để trống',
            'txtimg5.required' =>'không được để trống',
            'txtimg6.required' =>'không được để trống',
            /* 'required'   => '<div><strong  style="color: red;">Vui lòng không để trống trường này!</strong></div>',
            'unique'     => '<div><strong  style="color: red;">Dữ liệu này đã tồn tại!</strong></div>',
            'interger'     => '<div><strong  style="color: red;">Dữ liệu nhập phải là số!</strong></div>', */
        ];
    }
}
