@extends('layouts.app')

@section('content')
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
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-2">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>
                                    <div class="col-md-5 ">
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>
                                            </div>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Nhập lại mật
                                        khẩu mới</label>

                                    <div class="col-md-5 ">
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span>
                                            </div>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirm" required autocomplete="new-password">
                                        </div>
                                        @if ($errors->has('password_confirm'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirm') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
