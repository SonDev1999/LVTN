@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-12 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sửa Khuyến Mãi</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmuckhuyenmai/postSua')}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>ID Khuyến Mãi</label>
                                    <input type="text" class="form-control" name="id" value="{{$khuyenmai->id}}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tên Khuyến Mãi</label>
                                    <input type="text" class="form-control" name="tenkm" value="{{$khuyenmai->khuyenmai_ten}}">
                                    <div style="color: red;">
                                        {!! $errors->first('tenkm') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Loai Khuyến Mãi</label>
                                    <input type="text" class="form-control" name="loaikm" value="{{$khuyenmai->khuyenmai_loai}}">
                                    <div style="color: red;">
                                        {!! $errors->first('loaikm') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Giá Trị Khuyến Mãi</label></label>
                                    <input type="text" class="form-control" name="giatri" value="{{$khuyenmai->khuyenmai_gia_tri}}">
                                    <div style="color: red;">
                                        {!! $errors->first('thoigian') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Ngày Bắt Đầu</label>
                                    <input type="date" class="form-control" name="ngaybatdau" value="{{$khuyenmai->khuyenmai_ngay_bat_dau}}">
                                    <div style="color: red;">
                                        {!! $errors->first('ngaybatdau') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Ngày Kết Thúc</label>
                                    <input type="date" class="form-control" name="ngayketthuc" value="{{$khuyenmai->khuyenmai_ngay_ket_thuc}}">
                                    <div style="color: red;">
                                        {!! $errors->first('ngayketthuc') !!}
                                    </div>
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