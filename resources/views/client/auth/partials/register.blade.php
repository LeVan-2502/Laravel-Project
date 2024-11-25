@extends('client.auth.master')
@section('title')
Woody-Register
@endsection
@section('content')

<div id="site-main" class="site-main d-flex justify-content-center align-items-center">
    <div class="section-container">
        <div class="page-login-register">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 sm-m-b-50 m-auto">
                    <div class="bg-white  box-form-login">
                        <div style="text-align: center;margin-bottom: 2rem;">
                            <h3 style="padding: 12px; border-bottom: 2px solid black; display: inline-block;">TẠO MỚI TÀI KHOẢN</h3>
                        </div>
                        <div class="box-content">
                            <div class="form-register">
                                <form class="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="email">
                                        <label>Tên tài khoản <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="ten_tai_khoan" value="{{ old('ten_tai_khoan') }}">
                                    </div>
                                    @error('ten_tai_khoan')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="email">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" class="input-text" name="email" value="{{ old('email') }}">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="password">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password" class="input-text" name="password">
                                    </div>
                                    <div class="password">
                                        <label>Password confirm <span class="required">*</span></label>
                                        <input type="password" class="input-text" name="password_confirmation">
                                    </div>
                                    <div class="button-register">
                                        <input type="submit" class="button" name="register" value="Tạo mới">
                                    </div>
                                    @if ($errors->any())
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

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