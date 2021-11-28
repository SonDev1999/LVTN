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
                <h4 class="card-title">
                    @if(Session::has('nametable'))
                        <div class="col-12">
                            {!! Session::get('nametable')!!}
                        </div>
                    @endif
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3px">id</th>
                                <th>Người Nhận</th>
                                <th>SĐT Người Nhận</th>
                                <th>Địa Chỉ</th>
                                <th>Ghi Chú</th>
                                <th>Tổng Tiền</th>
                                <th>Khach Hàng</th>
                                <th>Trạng Thái</th>
                                <th>Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donhang as $val)
                            <tr>
                                <td >{{$val->id}}</td>
                                <td >{{$val->donhang_nguoi_nhan}}</td>
                                <td >{{$val->donhang_nguoi_nhan_sdt}}</td>
                                <td >{{$val->donhang_nguoi_nhan_dia_chi}}</td>
                                <td >{{$val->donhang_ghi_chu}}</td>
                                <td ><?php echo number_format($val->donhang_tong_tien, 0) . " VNĐ" ?></td>
                                <td >{{$val->id_khachhang}}</td>
                                <td >
                                    @if($val->id_tinhtrangdh==0)
                                        <div class="d-flex align-items-center"><i class="fa fa-circle text-warning mr-1"></i> DH đang chờ giải quyết</div>
                                    @elseif($val->id_tinhtrangdh==1)
                                        <div class="d-flex align-items-center"><i class="fa fa-circle text-warning mr-1"></i> DH đang chờ giao</div>
                                    @elseif($val->id_tinhtrangdh==2)
                                        <div class="d-flex align-items-center"><i class="fa fa-circle text-success mr-1"></i> DH đã được giao</div>
                                    @else
                                        <div class="d-flex align-items-center"><i class="fa fa-circle text-danger mr-1"></i> DH đã hủy</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="getCTDH/{{$val->id}}" class="btn btn-warning btn sweet-confirm">CTDH</a>
                                        @if($val->id_tinhtrangdh==0)
                                            <a href="getDuyetDH/{{$val->id}}" class="btn btn-success btn sweet-success">Duyệt DH</a>
                                            <a href="getXoaDH/{{$val->id}}" class="btn btn-danger btn sweet-wrong">Xóa DH</a>
                                        @elseif($val->id_tinhtrangdh==1)
                                            <a href="getDuyetDH/{{$val->id}}" class="btn btn-success btn sweet-success">Duyệt DH</a>
                                            <a href="getHuyDH/{{$val->id}}" class="btn btn-danger btn sweet-wrong">Hủy DH</a>
                                        @endif
                                    </div>
                                </td>
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