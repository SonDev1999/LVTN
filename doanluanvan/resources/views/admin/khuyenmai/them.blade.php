@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-4 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm Khuyến Mãi</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmuckhuyenmai/postThem')}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                       
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Tên Khuyến Mãi</label>
                                <input type="text" class="form-control" placeholder="Tên Khuyến Mãi" name="tenkm">
                                <div style="color: red;">
                                    {!! $errors->first('tenkm') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Loại Khuyến Mãi</label>
                                <input type="text" class="form-control" placeholder="Loại Khuyến Mãi" name="loaikm">
                                <div style="color: red;">
                                    {!! $errors->first('loaikm') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Giá Khuyến Mãi</label>
                                <input type="text" class="form-control" placeholder="Giá Khuyến Mãi" name="giakm">
                                <div style="color: red;">
                                    {!! $errors->first('giakm') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Ngày Bắt Đầu</label>
                                <input type="date" class="form-control" name="ngaybatdau">
                                <div style="color: red;">
                                    {!! $errors->first('ngaybatdau') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Ngày Kết Thúc</label>
                                <input type="date" class="form-control" name="ngayketthuc">
                                <div style="color: red;">
                                    {!! $errors->first('ngayketthuc') !!}
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