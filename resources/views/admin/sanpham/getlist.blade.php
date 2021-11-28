@extends('admin.master')
@section('content_star')
<div class="row">
    @if(Session::has('aler'))
        <div class="col-12">
                <div class="alert alert-{!! Session::get('alername') !!}" role="alert">
                    {!! Session::get('aler')!!}
                </div>
        </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datatable</h4>
                <!-- <button type="button" id="btn_AddProduct" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</button> -->
                <a href="getSanPham" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</a>
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
                                <td >{{$sp->id}}</td>
                                <td >{{$sp->sanpham_ten}}</td>
                                <td >{{$sp->sanpham_mau}}</td>
                                <td >{{$sp->sanpham_dung_luong}}</td>
                                <td >{{$sp->sanpham_mo_ta}}</td>
                                <td >{{$sp->sanpham_hinhanh}}</td>
                                <td ><?php echo number_format($sp->sanpham_gia, 0) . " VNĐ" ?></td>
                                <td >{{$sp->sanpham_so_luong}}</td>
                                <td >{{$sp->sanpham_thoi_gian_bao_hanh}}</td>
                                <td >{{$sp->sanpham_luot_xem}}</td>
                                
                                <td>
                                    <div class="d-flex">
                                        <!-- /<a href="javascript:" value="{{$sp->id}}" class="btn btn-primary shadow btn-xs sharp mr-1" id="btn_suaSP"><i class="fa fa-pencil"></i></a> -->
                                        <!-- <button class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP" value="{{$sp->id}}" id="btn_suaSP"><i class="fa fa-pencil"></i></button> -->
                                        <a href="getSuaSP/{{$sp->id}}" class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP"><i class="fa fa-pencil"></i></a>
                                        <a href="getXoaSP/{{$sp->id}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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