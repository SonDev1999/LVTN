
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
                <a href="{{route('themkhuyenmai')}}" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3px">id</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giá</th>
                                <th>Tổng Tiền</th>
                                <th>Ngày Mua</th>
                                <!-- <th>Hoạt Động</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitietdonhang as $val)
                            <tr>
                                <td >{{$val->id}}</td>
                                <td >{{$val->sanpham_ten}}</td>
                                <td >{{$val->chitietdonhang_so_luong}}</td>
                                <td ><?php echo number_format($val->chitietdonhang_gia, 0) . " VNĐ" ?></td>
                                <td ><?php echo number_format($val->chitietdonhang_tong_tien, 0) . " VNĐ" ?></td>
                                <td >{{$val->chitietdonhang_ngay_mua}}</td>
                                <!-- <td>
                                    <div class="d-flex">
                                        <a href="getCTDH/{{$val->id}}" class="btn btn-warning btn sweet-confirm">CTDH</a>
                                        <a href="getDuyet/{{$val->id}}" class="btn btn-success btn sweet-success">Duyệt DH</a>
                                        <a href="getXoa/{{$val->id}}" class="btn btn-danger btn sweet-wrong">Xóa DH</a>
                                    </div>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@stop