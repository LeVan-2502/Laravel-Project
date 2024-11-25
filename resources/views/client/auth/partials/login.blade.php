@extends('client.auth.master')
@section('title')
Woody-Login
@endsection
@section('content')
<div id="site-main" class="site-main d-flex justify-content-center align-items-center">
    <div class="section-container">
        <div class="page-login-register">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 sm-m-b-50 m-auto">
                    <div style="background-color: #fff; " class="box-form-login">
                        <div style="text-align: center;margin-bottom: 2rem;">
                            <h3 style="padding: 12px; border-bottom: 2px solid black; display: inline-block;">ĐĂNG NHẬP</h3>
                        </div>

                        <div class="box-content">
                            <div class="form-login">
                                <form action="{{ route('client.login')}}" class="sign-form widget-form " method="post">
                                    @csrf
                                    <div class="username">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="email" id="username">
                                    </div>
                                    <div class="password">
                                        <label for="password">Password <span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password">
                                    </div>

                                    <div class="rememberme-lost">
                                        <div class="remember-me">
                                            <input name="remember" type="checkbox" id="remember" value="forever">
                                            <label for="remember" class="inline">Nhớ mật khẩu</label>
                                        </div>
                                        <div class="lost-password">
                                            <a href="{{route('password.request')}}">Quên mật khẩu?</a>
                                        </div>
                                    </div>
                                    <div class="">
                                        @if (session('success'))
                                        <div id="thongbao-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>

                                        </div>
                                        @endif
                                        @if ($errors->any())
                                        <div id="thongbao-alert" class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show d-flex align-items-center justify-content-between" role="alert">
                                            <i class="ri-close-circle-fill fs-24 label-icon"></i>
                                            <strong>{{ $errors->first() }}</strong>

                                        </div>
                                        @endif
                                        @if(session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="button-login">
                                        <input type="submit" class="button" name="login" value="Login">
                                    </div>
                                </form>
                                <p class="form-group text-center m-t-3">Tạo tài khoản mới? <a href="{{route('client.register')}}" class="btn-link">Tạo mới</a> </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>

@endsection