@extends('layouts.app')

@section('content')
    @if (\Session::has('success'))
        <div class="col-md-4 col-md-offset-4" style="position: fixed; display: block">

            <div class="alert alert-success alert-dismissible" role="alert">{{ \Session::get('success') }}</div>
        </div>
    @endif
    <div class="container">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-inner">
                            <ul>
                                <li class="home">
                                    <a href="index.html">Trang Chủ</a>
                                    <span><i class="fa fa-angle-right"></i></span>
                                </li>
                                <li class="category3"><span>Lấy lại mật khẩu</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-contact-area">

            <div class="row">
                <div class="container">


                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                                    <h2 class="text-center">Lấy lại mật khẩu?</h2>
                                    <p>Vui lòng nhập email đã đăng ký.</p>

                                    <div class="panel-body">

                                        <form id="register-form" role="form" autocomplete="off" class="form"
                                            method="POST" action="">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                    <input id="email" type="email" placeholder="Địa chỉ email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <button type="submit" class="btn btn-lg btn-primary btn-block">Xác
                                                    nhận</button>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
