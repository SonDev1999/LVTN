@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-12 col-lg-12" id="form_suasanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sửa Sản Phẩm</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmucsanpham/postSuaSanPham')}}"  method="POST" id="form_SuaSanPham" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @foreach($sanpham as $sp)
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                    <label>ID Sản Phẩm</label>
                                    <input type="text" class="form-control" id="idsanpham" name="idsanpham" value="{{$sp->id}}" readonly>
                                    <div style="color: red;">
                                        {!! $errors->first('idsanpham') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" placeholder="Tên Sản Phẩm" id="tensanpham" name="tensanpham" value="{{$sp->sanpham_ten}}">
                                    <div style="color: red;">
                                        {!! $errors->first('tensanpham') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Thời Gian Bảo Hành</label>
                                    <input type="text" class="form-control" placeholder="thời gian bảo hành" id="thoigianbaohanh" name="thoigianbaohanh" value="{{$sp->sanpham_thoi_gian_bao_hanh}}">
                                    <div style="color: red;">
                                        {!! $errors->first('thoigianbaohanh') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Giá</label>
                                    <input type="text" class="form-control" placeholder="Giá" id="gia" name="gia" value="{{$sp->sanpham_gia}}">
                                    <div style="color: red;">
                                        {!! $errors->first('gia') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Trạng Thái</label>
                                    <input type="text" class="form-control" placeholder="trạng thái" id="trangthai" name="trangthai" value="{{$sp->sanpham_trang_thai}}">
                                    <div style="color: red;">
                                        {!! $errors->first('trangthai') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Màu</label>
                                    <input type="text" class="form-control" placeholder="màu" id="mau" name="mau" value="{{$sp->sanpham_mau}}">
                                    <div style="color: red;">
                                        {!! $errors->first('mau') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Loại Sản Phẩm</label>
                                    <select class="form-control" id="hang" name="hang">
                                        @foreach($loaisp as $lsp)
                                            @if($lsp->id == $sp->id_loaisp)
                                                <option>{{$lsp->loaisp_ten}}</option>
                                            @endif
                                        @endforeach
                                        @foreach($loaisp as $lsp)
                                            @if($lsp->id != $sp->id_loaisp)
                                                <option>{{$lsp->loaisp_ten}}</option>
                                            @endif
                                        @endforeach
                                        
                                    </select>

                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nhà Sản Xuất</label>
                                    <select class="form-control" id="nhasanxuat" name="nhasanxuat">
                                        @foreach($nhasanxuat as $nsx)
                                            @if($nsx->id_nhasanxuat == $sp->id_nhasanxuat)
                                                <option>{{$nsx->nhasanxuat_ten}}</option>
                                            @endif
                                        @endforeach
                                        @foreach($nhasanxuat as $nsx)
                                            @if($nsx->id_nhasanxuat != $sp->id_nhasanxuat)
                                                <option>{{$nsx->nhasanxuat_ten}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-4">
                                    <label>Khuyến Mãi</label>
                                    <select class="form-control" id="khuyenmai" name="khuyenmai">
                                        @foreach($khuyenmai as $km)
                                            @if($nsx->id_khuyenmai == $sp->id_khuyenmai)
                                                <option>{{$km->khuyenmai_ten}}</option>
                                            @endif
                                        @endforeach
                                        @foreach($khuyenmai as $km)
                                            @if($lsp->id_khuyenmai != $sp->id_khuyenmai)
                                                <option>{{$km->khuyenmai_ten}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-4">
                                    <label>Dung Luong</label>
                                    <input type="text" class="form-control" placeholder="dung lượng" id="dungluong" name="dungluong" value="{{$sp->sanpham_dung_luong}}">
                                    <div style="color: red;">
                                        {!! $errors->first('dungluong') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Số Lượng</label>
                                    <input type="text" class="form-control" placeholder="Số Lượng" id="soluong" name="soluong" value="{{$sp->sanpham_so_luong}}">
                                    <div style="color: red;">
                                        {!! $errors->first('soluong') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>nổi bật</label>
                                    <input type="text" class="form-control" placeholder="Nổi Bật" id="noibat" name="noibat" value="{{$sp->sanpham_noi_bat}}">
                                    <div style="color: red;">
                                        {!! $errors->first('noibat') !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hinhanh ">Hình Ảnh : <input type="text" class="form-control" name="img_current" value="{{$sp->sanpham_hinhanh}}" readonly></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file" id="hinhanh" name="hinhanh" accept="image/png, .jpeg, .jpg">
                                        <div style="color: red;">
                                            {!! $errors->first('hinhanh') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <img src="{!! asset('public/images/product/'.$sp->sanpham_hinhanh) !!}" alt="" style="width: 120px; height: 120px;"/>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Mô Tả</label>
                                    <textarea class="form-control" id="mota" name="mota" rows="5" placeholder="mô tả" >{{$sp->sanpham_mo_ta}}</textarea>
                                    <div style="color: red;">
                                        {!! $errors->first('mota') !!}
                                    </div>
                                </div>

                               <!--  <div class="row">
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
                                </div> -->

                                <div class="col-xl-12 col-lg-12" style="border: 2px dashed #b1154a;">
                                    <label>chi tiết sản phẩm</label>
                                    <br/>
                                    <?php $dem =1 ?>
                                    @foreach($hinhsanpham as $hinhsp)
                                            <div class="form-group col-md-4" style="float: left;">
                                                <div class="form-group col-md-8" style="float: left;">
                                                    <label>Hình {{$dem}}: {{$hinhsp->hinhsanpham_ten}}</label>
                                                    <input type="file" class="custom-file" name="txtimg{{$dem}}" accept="image/png, .jpeg, .jpg">
                                                    <div style="color: red;">
                                                        {!! $errors->first('txtimg{{$dem}}') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4" style="float: left;">
                                                    <img src="{!! asset('public/images/product-details/'.$hinhsp->hinhsanpham_ten) !!}" alt="" style="width: 120px; height: 120px;"/>
                                                </div>
                                            </div>
                                        <?php $dem++ ?>
                                    @endforeach
                                    <!-- <div class="custom-file col-md-3">
                                        <label>Hình 1</label>
                                        <input type="file" class="custom-file" name="txtimg1" accept="image/png, .jpeg, .jpg">
                                        <div style="color: red;">
                                        {!! $errors->first('txtimg1') !!}
                                    </div>
                                    <div class="form-group col-md-1">
                                        <img src="{!! asset('public/images/product-details/'.$sp->sanpham_hinhanh) !!}" alt="" style="width: 120px; height: 120px;"/>
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
                                </div> -->
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary" id="btn_add_product">Sữa Sản Phẩm</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop