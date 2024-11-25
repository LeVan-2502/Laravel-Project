@extends('client.auth.master')
@section('title')
Woody-Verify Email
@endsection
@section('content')

<div id="site-main" class="site-main">
    <div class="section">
        <div class="page-login-register">
            <div class="row ">
                <div class="col-lg-6 col-md-8 col-sm-12 m-auto">
                    <div style="background-color: #fff; margin-top: 220px" class="box-form-login">
                        <div style="text-align: center;margin-bottom: 2rem;">
                            <h3 style="padding: 12px; border-bottom: 2px solid black; display: inline-block;">XÁC NHẬN EMAIL</h3>
                        </div>

                        <div class="box-content">
                            <div class="form-login">
                                <form method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    @if (session('resent'))
                                    <p>A fresh verification link has been sent to your email address.</p>
                                    @endif

                                    <p>Trước khi tiếp tục, hãy kiểm tra email của bạn để lấy đường dẫn xác minh.</p>

                                    @if (session('resent'))
                                    <p>Đã gửi lại đường dẫn xác minh.</p>
                                    @endif
                                    <div class="">
                                        @if (session('message'))
                                        <div id="thongbao-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                        <div id="thongbao-alert" class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show d-flex align-items-center justify-content-between" role="alert">
                                            <i class="ri-close-circle-fill fs-24 label-icon"></i>
                                            <strong>{{ $errors->first() }}</strong>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="button-login">
                                        <input type="submit" class="button bg-danger" name="login" value="Gửi lại liên kết xác minh">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>

@endsection