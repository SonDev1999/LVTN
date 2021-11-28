@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-12 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm Tuyển Dụng</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmuctuyendung/postThem')}}"  method="POST" id="form_ThemSanPham" enctype="multipart/form-data">
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
                            <div class="form-group col-md-4">
                                <label>liên hệ</label>
                                <input type="text" class="form-control" placeholder="Liên Hệ" name="lienhe">
                                <div style="color: red;">
                                    {!! $errors->first('lienhe') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Thời Gian Bảo Hành</label>
                                <input type="date" class="form-control" placeholder="thời gian" name="thoigian">
                                <div style="color: red;">
                                    {!! $errors->first('thoigian') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tình Trạng</label>
                                <input type="text" class="form-control" placeholder="tình trạng" name="tinhtrang">
                                <div style="color: red;">
                                    {!! $errors->first('tinhtrang') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Mô Tả</label>
                                <textarea class="form-control" id="mota" name="mota" rows="5" placeholder="mô tả"></textarea>
                                <div style="color: red;">
                                    {!! $errors->first('mota') !!}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn_add_product">Thêm Sản Phẩm</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop