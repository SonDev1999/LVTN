@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-4 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sửa Tin Tức</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmucslidershow/postSua')}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>id </label>
                                    <input type="text" class="form-control" name="id" value="{{$slidershow->id}}" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="hinhanh ">Hình Ảnh : <input type="text" class="form-control" name="img_current" value="{{$slidershow->slider_hinh_anh}}" readonly></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file" id="hinhanh" name="hinhanh" accept="image/png, .jpeg, .jpg">
                                        <div style="color: red;">
                                            {!! $errors->first('hinhanh') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <img src="{!! asset('public/images/slidershow/'.$slidershow->slider_hinh_anh) !!}" alt="" style="width: 120px; height: 120px;"/>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary" id="btn_add_product">Sửa</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop