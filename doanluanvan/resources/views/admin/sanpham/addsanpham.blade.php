@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-12 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm Sản Phẩm</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmucsanpham/postSanPham')}}"  method="POST" id="form_ThemSanPham" enctype="multipart/form-data">
                        {{csrf_field()}}
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" class="form-control" placeholder="Tên Sản Phẩm" id="tensanpham" name="tensanpham">
                                <div style="color: red;">
                                    {!! $errors->first('tensanpham') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Thời Gian Bảo Hành</label>
                                <input type="text" class="form-control" placeholder="thời gian bảo hành" id="thoigianbaohanh" name="thoigianbaohanh">
                                <div style="color: red;">
                                    {!! $errors->first('thoigianbaohanh') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Giá</label>
                                <input type="text" class="form-control" placeholder="Giá" id="gia" name="gia">
                                <div style="color: red;">
                                    {!! $errors->first('gia') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Trạng Thái</label>
                                <input type="text" class="form-control" placeholder="trạng thái" id="trangthai" name="trangthai">
                                <div style="color: red;">
                                    {!! $errors->first('trangthai') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Màu</label>
                                <input type="text" class="form-control" placeholder="màu" id="mau" name="mau">
                                <div style="color: red;">
                                    {!! $errors->first('mau') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Dung Luong</label>
                                <input type="text" class="form-control" placeholder="dung lượng" id="dungluong" name="dungluong">
                                <div style="color: red;">
                                    {!! $errors->first('dungluong') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" id="hang" name="hang">
                                    @foreach($loaisp as $lsp)
                                    <option>{{$lsp->loaisp_ten}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label>Nhà Sản Xuất</label>
                                <select class="form-control" id="nhasanxuat" name="nhasanxuat">
                                    @foreach($nhasanxuat as $nsx)
                                    <option>{{$nsx->nhasanxuat_ten}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label>Khuyến Mãi</label>
                                <select class="form-control" id="khuyenmai" name="khuyenmai">
                                    @foreach($khuyenmai as $km)
                                    <option>{{$km->khuyenmai_ten}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label>Số Lượng</label>
                                <input type="text" class="form-control" placeholder="Số Lượng" id="soluong" name="soluong">
                                <div style="color: red;">
                                    {!! $errors->first('soluong') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>nổi bật</label>
                                <input type="text" class="form-control" placeholder="Nổi Bật" id="noibat" name="noibat">
                                <div style="color: red;">
                                    {!! $errors->first('noibat') !!}
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
                                <label>Mô Tả</label>
                                <textarea class="form-control" id="mota" name="mota" rows="5" placeholder="mô tả"></textarea>
                                <div style="color: red;">
                                    {!! $errors->first('mota') !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 col-xxl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Summernote Editor</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="summernote"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12" style="border: 2px dashed #b1154a;">
                                <label>chi tiết sản phẩm</label>
                                <br/>
                                <div class="custom-file col-md-3">
                                    <label>Hình 1: </label>
                                    <input type="file" class="custom-file" name="txtimg1" accept="image/png, .jpeg, .jpg">
                                    <div style="color: red;">
                                    {!! $errors->first('txtimg1') !!}
                                </div>
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 2</label>
                                    <input type="file" class="custom-file" name="txtimg2" accept="image/png, .jpeg, .jpg">
                                    <div style="color: red;">
                                    {!! $errors->first('txtimg2') !!}
                                </div>
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 3</label>
                                    <input type="file" class="custom-file" name="txtimg3" accept="image/png, .jpeg, .jpg">
                                    <div style="color: red;">
                                    {!! $errors->first('txtimg3') !!}
                                </div>
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 4</label>
                                    <input type="file" class="custom-file" name="txtimg4" accept="image/png, .jpeg, .jpg">
                                    <div style="color: red;">
                                    {!! $errors->first('txtimg4') !!}
                                </div>
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 5</label>
                                    <input type="file" class="custom-file" name="txtimg5" accept="image/png, .jpeg, .jpg">
                                    <div style="color: red;">
                                    {!! $errors->first('txtimg5') !!}
                                </div>
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 6</label>
                                    <input type="file" class="custom-file" name="txtimg6" accept="image/png, .jpeg, .jpg">
                                    <div style="color: red;">
                                    {!! $errors->first('txtimg6') !!}
                                </div>
                                    <br/>
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