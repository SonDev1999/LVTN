@extends('admin.master')
@section('content_star')
<div class="row">
    <div class="col-xl-10 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm Sản Phẩm</h4>
                <button type="submit" id="btn_thoat_addsanpham" class="btn btn-primary">Thoát</button>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" action="{{URL::to('/post_sanpham')}}" id="themsanpham">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" class="form-control" placeholder="Tên Sản Phẩm" id="tensanpham" name="tensanpham">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Thời Gian Bảo Hành</label>
                                <input type="text" class="form-control" placeholder="thời gian bảo hành" id="thoigianbaohanh" name="thoigianbaohanh">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá</label>
                                <input type="text" class="form-control" placeholder="Giá" id="gia" name="gia">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Trạng Thái</label>
                                <input type="text" class="form-control" placeholder="trạng thái" id="trangthai" name="trangthai">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Màu</label>
                                <input type="text" class="form-control" placeholder="màu" id="mau" name="mau">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Dung Luong</label>
                                <input type="text" class="form-control" placeholder="dung lượng" id="dungluong" name="dungluong">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" id="hang" name="hang">
                                    @foreach($loaisp as $lsp)
                                    <option>{{$lsp->loaisp_ten}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Nhà Sản Xuất</label>
                                <select class="form-control" id="hang" name="hang">
                                    @foreach($nhasanxuat as $nsx)
                                    <option>{{$nsx->nhasanxuat_ten}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Khuyến Mãi</label>
                                <select class="form-control" id="khuyenmai" name="khuyenmai">
                                    @foreach($khuyenmai as $km)
                                    <option>{{$km->khuyenmai_ten}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Số Lượng</label>
                                <input type="text" class="form-control" placeholder="Số Lượng" id="soluong" name="soluong">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hinhanh ">Hình Ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file" id="hinhanh" name="hinhanh" accept="image/png, .jpeg, .jpg">

                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mô Tả</label>
                                <textarea class="form-control" id="mota" name="mota" rows="5" placeholder="mô tả"></textarea>
                            </div>
                            <div class="form-group col-md-12" style="border: 2px dashed #b1154a;">
                                <label>chi tiết sản phẩm</label>
                                <br/>
                                <div class="custom-file col-md-3">
                                    <label>Hình 1: </label>
                                    <input type="file" class="custom-file" name="txtimg1" accept="image/png, .jpeg, .jpg">
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 2</label>
                                    <input type="file" class="custom-file" name="txtimg2" accept="image/png, .jpeg, .jpg">
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 3</label>
                                    <input type="file" class="custom-file" name="txtimg3" accept="image/png, .jpeg, .jpg">
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 4</label>
                                    <input type="file" class="custom-file" name="txtimg4" accept="image/png, .jpeg, .jpg">
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 5</label>
                                    <input type="file" class="custom-file" name="txtimg5" accept="image/png, .jpeg, .jpg">
                                    <br/>
                                </div>
                                <div class="custom-file col-md-3">
                                    <label>Hình 6</label>
                                    <input type="file" class="custom-file" name="txtimg6" accept="image/png, .jpeg, .jpg">
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

    

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datatable</h4>
                <button type="button" id="btn_AddProduct" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3px">id</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Màu</th>
                                <th>Dung Lượng</th>
                                <th>Nội Dung Mô Tả</th>
                                <th>Hình Ảnh</th>
                                <th>Giá</th>
                                <th>SL </th>
                                <th>tg bảo hành</th>
                                <th>lượt xem</th>
                                <th>Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $sp)
                            <tr>
                                <td id="list_idsanpham{{$sp->id}}" value="{{$sp->id}}"  width="3px">{{$sp->id}}</td>
                                <td id="list_tensanpham{{$sp->id}}" value="{{$sp->sanpham_ten}}">{{$sp->sanpham_ten}}</td>
                                <td id="list_tensanpham{{$sp->id}}" value="{{$sp->sanpham_ten}}">{{$sp->sanpham_mau}}</td>
                                <td id="list_tensanpham{{$sp->id}}" value="{{$sp->sanpham_ten}}">{{$sp->sanpham_dung_luong}}</td>
                                <td id="list_noidungmota{{$sp->id}}">{{$sp->sanpham_mo_ta}}</td>
                                <td id="list_hinhanh{{$sp->id}}">{{$sp->sanpham_hinhanh}}</td>
                                <td id="list_gia{{$sp->id}}"><?php echo number_format($sp->sanpham_gia, 0) . " VNĐ" ?></td>
                                <td id="list_soluong{{$sp->id}}">{{$sp->sanpham_so_luong}}</td>
                                <td id="list_hangxe{{$sp->id}}">{{$sp->sanpham_thoi_gian_bao_hanh}}</td>
                                <td id="list_hangxe{{$sp->id}}">{{$sp->sanpham_luot_xem}}</td>
                                
                                <td>
                                    <div class="d-flex">
                                        <!-- /<a href="javascript:" value="{{$sp->id}}" class="btn btn-primary shadow btn-xs sharp mr-1" id="btn_suaSP"><i class="fa fa-pencil"></i></a> -->
                                        <button class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP" value="{{$sp->id}}" id="btn_suaSP"><i class="fa fa-pencil"></i></button>
                                        <a href="getxoa/{{$sp->id}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>Mã Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Nội Dung Mô Tả</th>
                                <th>Hình Ảnh</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Hãng Xe</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop