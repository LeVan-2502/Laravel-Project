@extends('client.auth.master')
@section('title')
Woody-Email Reset
@endsection
@section('content')

<div id="site-main" class="site-main">
    <div class="section">
        <div class="page-login-register">
            <div class="row ">
                <div class="col-lg-6 col-md-8 col-sm-12 m-auto">
                    <div style="background-color: #fff; margin-top: 220px" class="box-form-login">
                        <div style="text-align: center;margin-bottom: 2rem;">
                            <h3 style="padding: 12px; border-bottom: 2px solid black; display: inline-block;">QUÊN MẬT KHẨU</h3>
                        </div>

                        <div class="box-content">
                            <div class="form-login">
                                @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="username">
                                        <label>Nhập Email <span class="required">*</span></label>
                                        <input type="email" class="input-text" name="email" id="email">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="">
                                        @if (session('success'))
                                        <div id="thongbao-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
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
                                        <input type="submit" class="button" name="login" value="Gửi liên kết reset">
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