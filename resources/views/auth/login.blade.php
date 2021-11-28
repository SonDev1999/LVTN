@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng nhập</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- account-details Area Start -->
    <div class="customer-login-area ogin_form_wrapper">
        <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                
                    <div class="customer-login my-account  ">
                        <form method="post" class="login" action="{{ route('login') }}">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng nhập</h2>
                                <p class="form-row form-row-wide">
                                    <label for="email">{{ __('E-Mail') }}<span class="required">*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">{{ __('Mật khẩu') }}<span
                                            class="required">*</span></label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                            <div class="form-action">
                                @if (Route::has('password.request'))
                                    <p class="lost_password"><a href="{{ route('get.reset.password') }}">
                                            {{ __('Quên mật khẩu?') }}
                                        </a></p>
                                @endif
                                <div class="actions-log">
                                    <input type="submit" class="button" name="Login" value="Đăng nhập">
                                </div>
                                <label for="rememberme" class="inline">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="main customer-login  form-group row">
                        <div class="col-md-6 offset-md-3 mt-4">
                            <a href="" class="btn btn-danger btn-block">Đăng nhập Google</a>
                            <a href="" class="btn btn-primary btn-block">Đăng nhập Facebook</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
