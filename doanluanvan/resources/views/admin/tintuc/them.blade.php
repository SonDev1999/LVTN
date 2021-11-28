@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-12 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm Tin Tức</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmuctintuc/postThem')}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Tiêu Đề</label>
                                <input type="text" class="form-control" placeholder="tiêu đề" name="tieude">
                                <div style="color: red;">
                                    {!! $errors->first('tieude') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="hinhanh ">Hình Ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file" id="hinhanh" name="hinhanh" accept="image/png, .jpeg, .jpg" value="{!! old('hinhanh') !!}">
                                    <div style="color: red;">
                                    {!! $errors->first('hinhanh') !!}
                                </div>

                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nội Dung</label>
                                <textarea class="form-control" name="noidung" rows="5" placeholder="mô tả"></textarea>
                                <div style="color: red;">
                                    {!! $errors->first('noidung') !!}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn_add_product">Thêm</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop