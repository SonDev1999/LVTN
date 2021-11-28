@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm Nhân Viên</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <!-- <form action="{{URL::to('/admin/danhmucnhanvien/postThem')}}"  method="POST" enctype="multipart/form-data"> -->
                    <form action="{{route('postthemNhanVien')}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Tên Nhân Viên</label>
                                <input type="text" class="form-control" placeholder="Tên Nhân Viên" name="tennhanvien">
                                <div style="color: red;">
                                    {!! $errors->first('tennhanvien') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>CCCD/CMND</label>
                                <input type="text" class="form-control" placeholder="CCCD/CMND" name="cccd">
                                <div style="color: red;">
                                    {!! $errors->first('cccd') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>SĐT</label>
                                <input type="text" class="form-control" placeholder="SĐT" name="sdt">
                                <div style="color: red;">
                                    {!! $errors->first('sdt') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Giới Tính</label>
                                <select class="form-control" name="gioitinh">
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                                <div style="color: red;">
                                    {!! $errors->first('gioitinh') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ngày Vào Làm</label>
                                <input type="date" class="form-control" placeholder="Ngày Vào Làm" name="ngayvaolam">
                                <div style="color: red;">
                                    {!! $errors->first('ngayvaolam') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Địa Chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa Chỉ" name="diachi">
                                <div style="color: red;">
                                    {!! $errors->first('diachi') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                <div style="color: red;">
                                    {!! $errors->first('email') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Passsword</label>
                                <input type="password" class="form-control" placeholder="password" name="password">
                                <div style="color: red;">
                                    {!! $errors->first('password') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nhập Lại Passsword</label>
                                <input type="password" class="form-control" placeholder="Nhập Lại password" name="password_confirmation">
                                <div style="color: red;">
                                    {!! $errors->first('password2') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Bộ Phận</label>
                                <select class="form-control" name="bophan">
                                    <option>Tuyển Dụng</option>
                                    <option>Tin Tức</option>
                                    <option>Khuyến Mãi</option>
                                    <option>Sản Phẩm</option>
                                    <option>Loại Sản Phẩm</option>
                                    <option>Nhà Sản Xuất</option>
                                    <option>Nhân Viên</option>
                                    <option>Khách Hàng</option>

                                </select>
                                <div style="color: red;">
                                    {!! $errors->first('gioitinh') !!}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn_add_product">Thêm Nhân Viên</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop