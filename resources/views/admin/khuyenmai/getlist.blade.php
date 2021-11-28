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
                                <th>Tên Khuyến Mãi</th>
                                <th>Loại Khuyến Mãi</th>
                                <th>Giá Trị KM</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>ngày kết thúc</th>
                                <th>Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khuyenmai as $val)
                            <tr>
                                <td >{{$val->id}}</td>
                                <td >{{$val->khuyenmai_ten}}</td>
                                <td >{{$val->khuyenmai_loai}}</td>
                                <td ><?php echo number_format($val->khuyenmai_gia_tri, 0) . " VNĐ" ?></td>
                                <td >{{$val->khuyenmai_ngay_bat_dau}}</td>
                                <td >{{$val->khuyenmai_ngay_ket_thuc}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="getSua/{{$val->id}}" class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP"><i class="fa fa-pencil"></i></a>
                                        <a href="getXoa/{{$val->id}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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