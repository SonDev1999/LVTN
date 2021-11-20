@extends('layouts.app')

@section('content')
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
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- account-details Area Start -->
    <div class="customer-login-area">
        <div class="container">
          <div class="col-md-8 col-md-offset-2">
                 
                    <div class="customer-register my-account">
                        <form method="post" class="register" action="{{ route('register') }}">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="name">{{ __('Họ tên') }}<span class="required">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="email">{{ __('Địa chỉ email') }}<span class="required">*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </p>
                                <p class="form-row form-row-wide">
                                  <label for="password">{{ __('Password') }}<span class="required">*</span></label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="form-row form-row-wide">
                                  <label for="password-confirm">{{ __('Confirm Password') }}<span class="required">*</span></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                </p>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="Register" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
@endsection
