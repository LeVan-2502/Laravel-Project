@extends('client.auth.master')
@section('title')
Woody-Reset Password
@endsection
@section('content')
<div id="site-main" class="site-main d-flex justify-content-center align-items-center">
    <div class="section-container">
        <div class="page-login-register">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 sm-m-b-50 m-auto">
                    <div class="bg-white  box-form-login">
                        <div style="text-align: center;margin-bottom: 2rem;">
                            <h3 style="padding: 12px; border-bottom: 2px solid black; display: inline-block;">ĐẶT LẠI MẬT KHẨU</h3>
                        </div>
                        <div class="box-content">
                            <div class="form-register">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="email">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" class="input-text" name="email" value="{{ $email }}">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="password">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password" class="input-text" name="password">
                                    </div>
                                    <div class="password">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password" class="input-text" name="password_confirmation">
                                    </div>
                                    <div class="button-register">
                                        <input type="submit" class="button" name="register" value="Tạo mới">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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