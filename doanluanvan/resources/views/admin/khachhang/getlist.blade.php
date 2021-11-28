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
                <a href="getThem" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3px">id</th>
                                <th>Tên Khách Hàng</th>
                                <th>SDT</th>
                                <th>Địa Chỉ</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Trạng Thái</th>
                                <th>Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khachhang as $val)
                            <tr>
                                <td >{{$val->id}}</td>
                                <td >{{$val->khachhang_ten}}</td>
                                <td >{{$val->khachhang_sdt}}</td>
                                <td >{{$val->khachhang_dia_chi}}</td>
                                <td >{{$val->email}}</td>
                                <td >{{$val->password}}</td>
                                <td >
                                    @if($val->users_trang_thai==0)
                                        <p style="color:red;">TK đang khóa</p>
                                    @else($val->users_trang_thai==1)
                                        <p style="color:rgb(0,255,0);">TK đang mở</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @if($val->users_trang_thai==0)
                                            <a href="getmotk/{{$val->id}}" class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP"><i class="fa fa-unlock"></i></a>
                                        @else($val->users_trang_thai==1)
                                            <a href="getkhoatk/{{$val->id}}" class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP"><i class="fa fa-lock"></i></a>
                                        @endif
                                        
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