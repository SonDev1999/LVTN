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
                <a href="{{route('themNhanVien')}}" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3px">id</th>
                                <th>Tên Nhân Viên</th>
                                <th>CCCD</th>
                                <th>SĐT</th>
                                <th>Giới Tính</th>
                                <th>Ngày Vào Làm</th>
                                <th>Địa Chỉ</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Trạng Thái</th>
                                <th>Loại Tài Khoản</th>
                                <th>Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nhanvien as $val)
                            <tr>
                                <td >{{$val->id}}</td>
                                <td >{{$val->nhanvien_ten}}</td>
                                <td >{{$val->nhanvien_cccd}}</td>
                                <td >{{$val->nhanvien_sdt}}</td>
                                <td >
                                    @if($val->nhanvien_gioi_tinh==0)
                                        <p>Nam</p>
                                    @else($val->nhanvien_gioi_tinh==1)
                                        <p>Nữ</p>
                                    @endif

                                </td>
                                <td >{{$val->nhanvien_ngay_vao_lam}}</td>
                                <td >{{$val->nhanvien_dia_chi}}</td>
                                <td >{{$val->email}}</td>
                                <!-- <td >{{$val->password}}</td> -->
                                <td >
                                    @if($val->users_trang_thai==0)
                                        <p style="color:red;">TK đang khóa</p>
                                    @else($val->users_trang_thai==1)
                                        <p style="color:rgb(0,255,0);">TK đang mở</p>
                                    @endif
                                </td>
                                <td >
                                    <?php 
                                        switch ($val->loainguoidung) {
                                            case "2": echo '<p>admin</p>'; break;
                                            case "3": echo '<p>QL Nhân Viên</p>'; break;
                                            case "4": echo '<p>QL Tin Tức</p>'; break;
                                            case "5": echo '<p>QL Tuyển Dụng</p>'; break; 
                                            case "6": echo '<p>QL Khuyến Mãi</p>'; break;
                                            case "7": echo '<p>QL Sản Phẩm</p>'; break; 
                                            case "8": echo '<p>QL Nhà Sản Xuất</p>'; break; 
                                            case "9": echo '<p>QL Loại Sản Phẩm</p>'; break; 
                                            default: echo '<p>Chưa Có Chức Vụ</p>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @if($val->users_trang_thai==0)
                                            <a href="getmotk/{{$val->id}}" class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP"><i class="fa fa-unlock"></i></a>
                                        @else($val->users_trang_thai==1)
                                            <a href="getkhoatk/{{$val->id}}" class="btn btn-primary shadow btn-xs sharp mr-1 btn_suaSP"><i class="fa fa-lock"></i></a>
                                        @endif
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