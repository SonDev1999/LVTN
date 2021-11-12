<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addsanpham extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'tensanpham'  => 'required|unique:sanpham,sanpham_ten',
            'thoigianbaohanh' => 'required|unique:sanpham,sanpham_ky_hieu|size:5',
            'gia'  => 'required',
            'trangthai'  => 'required',
            'mau' => 'required',
            'dungluong' => 'required|mimes:jpeg,bmp,png|max:4000',
            'soluong' => 'required|mimes:jpeg,bmp,png|max:4000',
            'hinhanh' => 'required|mimes:jpeg,bmp,png|max:4000',
            'mota' => 'required|mimes:jpeg,bmp,png|max:4000',
            'txtimg1' => 'required|mimes:jpeg,bmp,png|max:4000',
            'txtimg2' => 'required|mimes:jpeg,bmp,png|max:4000',
            'txtimg3' => 'required|mimes:jpeg,bmp,png|max:4000',
            'txtimg4' => 'required|mimes:jpeg,bmp,png|max:4000',
            'txtimg5' => 'required|mimes:jpeg,bmp,png|max:4000',
            'txtimg6' => 'required|mimes:jpeg,bmp,png|max:4000',
            //
        ];
    }
    public function messages() {
        return [
            'required'   => '<div><strong  style="color: red;">Vui lòng không để trống trường này!</strong></div>',
            'unique'     => '<div><strong  style="color: red;">Dữ liệu này đã tồn tại!</strong></div>',
            'txtSPSignt.size'   => '<div><strong  style="color: red;">Độ dài dữ liệu trường này là 5!</strong></div>',
            'mimes' => '<div><strong  style="color: red;">Vui lòng chọn đúng file ảnh</strong></div>',
            'max' => '<div><strong  style="color: red;">Vui lòng chọn file ảnh có kích thước không quá 2MB</strong></div>'
        ];
    }
}
