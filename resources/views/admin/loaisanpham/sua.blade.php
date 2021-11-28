
@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sửa Loại Sản Phẩm</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmucloaisanpham/postSua')}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>ID Loại Sản Phẩm</label>
                                    <input type="text" class="form-control" name="id" value="{{$loaisp->id}}" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Tên Loại Sản Phẩm</label>
                                    <input type="text" class="form-control" name="tenloai" value="{{$loaisp->loaisp_ten}}">
                                    <div style="color: red;">
                                        {!! $errors->first('tenloai') !!}
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