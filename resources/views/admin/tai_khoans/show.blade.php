@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">{{$table}}</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.tai_khoans.' .$rou)}}">Danh sách {{$title}}</a></li>

            <li class="breadcrumb-item active">Chi tiết {{$title}}</li>
        </ol>
    </div>

</div>
<div class="container-fluid">
    <div class="position-relative mx-n4 mt-4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ asset('storage/he_thongs/profile-bg.jpg')}}" class="profile-wid-img" alt="">
            <!-- <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div style="background-color:#e5e7e9 ;" class="card mt-n5">
                <div class="card-body p-3">
                    <form class="row" action="{{ route('admin.tai_khoans.update-image', $model->id) }}" method="POST" enctype="multipart/form-data">
                        @method("PATCH")
                        @csrf
                        <div class="text-center col-12">
                            <div class="profile-user position-relative d-inline-block mx-auto mb-4 mt-4">
                                <img src="{{ \Storage::url($model->hinh_anh)}}" style="border-radius: 50%; width: 180px; height: 180px; object-fit: cover;" alt="user-profile-image">
                                <div class="">
                                    <!-- Ẩn phần input file gốc -->
                                    <input name="hinh_anh" id="hinh_anh" type="file" class="d-none">
                                    <!-- Tạo giao diện cho nút chọn file với icon -->
                                    <label for="hinh_anh" class="profile-photo-edit avatar-xs d-flex justify-content-center align-items-center">
                                        <span class="">
                                            <i class="ri-camera-fill fs-20"></i>
                                        </span>
                                    </label>
                                </div>

                            </div>
                            
                        </div>
                        <div class="col-2"></div>
                        <button type="submit" class="col-8 btn btn-primary d-flex justify-content-center align-items-center">Cập nhật avatar</button>
                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="fs-16 mb-1 text-center">{{$model->ten_tai_khoan}}</h5>
                    <p class="text-muted mb-0 text-center">{{$model->gioi_thieu}}</p>
                </div>
            </div>
            <!--end card-->

            <div style="background-color:#e5e7e9 ;" class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Thông tin cá nhân</h5>
                            <p>Múc độ hoàn thành</p>
                        </div>

                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($profile['type']) && isset($profile['percent']))
                    <div class="progress animated-progress custom-progress progress-label">
                        <div class="progress-bar bg-{{ $profile['type'] }}" role="progressbar"
                            style="width: {{ $profile['percent'] }}%" aria-valuenow="{{ $profile['percent'] }}" aria-valuemin="0" aria-valuemax="100">
                            <div class="label">{{ $profile['percent'] }}%</div>
                        </div>
                    </div>
                    @endif


                </div>
            </div>

            <div style="background-color:#e5e7e9 ;" class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Portfolio</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i class="ri-add-fill align-bottom me-1"></i> Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-body text-body">
                                <i class="ri-github-fill"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" id="gitUsername" placeholder="Username" value="@daveadame">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-primary">
                                <i class="ri-global-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com" value="www.velzon.com">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-success">
                                <i class="ri-dribbble-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="dribbleName" placeholder="Username" value="@dave_adame">
                    </div>
                    <div class="d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-danger">
                                <i class="ri-pinterest-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pinterestName" placeholder="Username" value="Advance Dave">
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                <i class="ri-file-chart-fill fs-20"></i> <strong>Thông tin cá nhân</strong>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab" aria-selected="false" tabindex="-1">
                                <i class=" ri-lock-2-fill fs-20"></i> <strong>Cập nhật mật khẩu</strong>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab" aria-selected="false" tabindex="-1">
                                <i class=" ri-shopping-bag-2-fill fs-20"></i> <strong>Danh sách đơn hàng</strong>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab" aria-selected="false" tabindex="-1">
                                <i class=" ri-layout-masonry-fill fs-20"></i> <strong>Công việc</strong>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="{{ route('admin.tai_khoans.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PATCH")
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            @if (session('thongbao'))
                                            <div id="thongbao-alert" class="alert alert-{{ session('thongbao.type') }} alert-dismissible bg-{{ session('thongbao.type') }} text-white alert-label-icon fade show" role="alert">
                                                <i class=" bx bx-check-circle label-icon fs-24"></i><strong> {{ session('thongbao.message') }}</strong>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @php
                                            session()->forget('thongbao');
                                            @endphp
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="ten_tai_khoan" class="form-label">Tên tài khoản</label>
                                            <input value="{{ $model->ten_tai_khoan }}" name="ten_tai_khoan" type="text" id="ten_tai_khoan" class="form-control" placeholder="Enter name">
                                            @error('ten_tai_khoan')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input value="{{ $model->email }}" name="email" type="text" id="email" class="form-control" placeholder="Enter email">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                            <input value="{{ $model->so_dien_thoai }}" name="so_dien_thoai" type="text" id="so_dien_thoai" class="form-control" placeholder="Enter so_dien_thoai">
                                            @error('so_dien_thoai')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="dia_chi" class="form-label">Địa chỉ</label>
                                            <input value="{{ $model->dia_chi }}" name="dia_chi" type="text" id="dia_chi" class="form-control" placeholder="Enter dia_chi">
                                            @error('dia_chi')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                                            <select class="form-control" name="gioi_tinh">
                                                <option value="">--Chọn giới tính--</option>
                                                <option value="1" {{ $model->gioi_tinh == '1' ? 'selected' : '' }}>Nam</option>
                                                <option value="2" {{ $model->gioi_tinh == '2' ? 'selected' : '' }}>Nữ</option>
                                                <option value="3" {{ $model->gioi_tinh == '3' ? 'selected' : '' }}>Khác</option>
                                            </select>
                                            @error('gioi_tinh')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="trang_thai" class="form-label">Trạng thái</label>
                                            <select name="trang_thai" id="trang_thai" class="form-control">
                                                <option value="">-- Chọn trạng thái --</option>
                                                <option value="1" {{ $model->trang_thai == '1' ? 'selected' : '' }}>Hoạt động</option>
                                                <option value="2" {{ $model->trang_thai == '2' ? 'selected' : '' }}>Tạm dừng</option>
                                            </select>
                                            @error('trang_thai')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="vai_tro_id" class="form-label">Vai trò</label>
                                            <select value="{{ $model->vai_tro_id }}" name="vai_tro_id" id="" class="form-control">
                                                <option value="">--Chọn vai trò--</option>
                                                @foreach($vai_tros as $item)
                                                <option value="{{$item->id}}" {{ $model->vai_tro_id == $item->id ? 'selected' : '' }}>{{$item->ten_vai_tro}}</option>
                                                @endforeach
                                            </select>
                                            @error('vai_tro_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="gioi_thieu" class="form-label">Giới thiệu</label>
                                            <input value="{{ $model->gioi_thieu }}" name="gioi_thieu" type="text" id="gioi_thieu" class="form-control" placeholder="Enter gioi_thieu">
                                            @error('gioi_thieu')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            <a href="{{ route('admin.tai_khoans.show', $model->id)}}" class="btn btn-soft-success">Trở về</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">

                            <div class="row g-2">
                                <form action="{{ route('admin.tai_khoans.update-pass', $model->id) }}" method="POST" enctype="multipart/form-data">
                                    @method("PATCH")
                                    @csrf
                                    <div class="col-lg-12">
                                        <label for="old_password" class="form-label">Mật khẩu cũ</label>
                                        <div class="row justify-content-between">
                                            <div class="col-10">
                                                <input name="old_password" type="password" id="old_password" class="form-control" placeholder="Enter name">
                                                @error('old_password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-success col-2">Xác nhận mật khẩu cũ</button>

                                        </div>
                                    </div>
                                </form>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                    </div>
                                </div>
                                <form action="{{ route('admin.tai_khoans.update-pass', $model->id) }}" method="POST" enctype="multipart/form-data">
                                    @method("PATCH")
                                    @csrf
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="new_password" class="form-label">Mật khẩu mới</label>
                                            <input name="new_password" type="password" id="new_password" class="form-control" placeholder="Enter name">
                                            @error('new_password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="re_password" class="form-label">Nhập lại mật khẩu mới</label>
                                            <input name="re_password" type="password" id="re_password" class="form-control" placeholder="Enter name">
                                            @error('re_password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Cập nhật mật khẩu</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                            </div>
                            <!--end row-->
                            </form>
                            <div class="mt-4 mb-3 border-bottom pb-2">
                                <div class="float-end">
                                    <a href="javascript:void(0);" class="link-primary">All Logout</a>
                                </div>
                                <h5 class="card-title">Login History</h5>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>iPhone 12 Pro</h6>
                                    <p class="text-muted mb-0">Los Angeles, United States - March 16 at 2:47PM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-tablet-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Apple iPad Pro</h6>
                                    <p class="text-muted mb-0">Washington, United States - November 06 at 10:43AM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Galaxy S21 Ultra 5G</h6>
                                    <p class="text-muted mb-0">Conneticut, United States - June 12 at 3:24PM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-macbook-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Dell Inspiron 14</h6>
                                    <p class="text-muted mb-0">Phoenix, United States - July 26 at 8:10AM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="experience" role="tabpanel">
                            <form>
                                <div id="newlink">
                                    <div id="1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobTitle" class="form-label">Job Title</label>
                                                    <input type="text" class="form-control" id="jobTitle" placeholder="Job title" value="Lead Designer / Developer">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="companyName" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="companyName" placeholder="Company name" value="Themesbrand">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="experienceYear" class="form-label">Experience Years</label>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices="" data-choices-search-false="" name="experienceYear" id="experienceYear">
                                                                <option value="">Select years</option>
                                                                <option value="Choice 1">2001</option>
                                                                <option value="Choice 2">2002</option>
                                                                <option value="Choice 3">2003</option>
                                                                <option value="Choice 4">2004</option>
                                                                <option value="Choice 5">2005</option>
                                                                <option value="Choice 6">2006</option>
                                                                <option value="Choice 7">2007</option>
                                                                <option value="Choice 8">2008</option>
                                                                <option value="Choice 9">2009</option>
                                                                <option value="Choice 10">2010</option>
                                                                <option value="Choice 11">2011</option>
                                                                <option value="Choice 12">2012</option>
                                                                <option value="Choice 13">2013</option>
                                                                <option value="Choice 14">2014</option>
                                                                <option value="Choice 15">2015</option>
                                                                <option value="Choice 16">2016</option>
                                                                <option value="Choice 17" selected="">2017</option>
                                                                <option value="Choice 18">2018</option>
                                                                <option value="Choice 19">2019</option>
                                                                <option value="Choice 20">2020</option>
                                                                <option value="Choice 21">2021</option>
                                                                <option value="Choice 22">2022</option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            to
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default2">
                                                                <option value="">Select years</option>
                                                                <option value="Choice 1">2001</option>
                                                                <option value="Choice 2">2002</option>
                                                                <option value="Choice 3">2003</option>
                                                                <option value="Choice 4">2004</option>
                                                                <option value="Choice 5">2005</option>
                                                                <option value="Choice 6">2006</option>
                                                                <option value="Choice 7">2007</option>
                                                                <option value="Choice 8">2008</option>
                                                                <option value="Choice 9">2009</option>
                                                                <option value="Choice 10">2010</option>
                                                                <option value="Choice 11">2011</option>
                                                                <option value="Choice 12">2012</option>
                                                                <option value="Choice 13">2013</option>
                                                                <option value="Choice 14">2014</option>
                                                                <option value="Choice 15">2015</option>
                                                                <option value="Choice 16">2016</option>
                                                                <option value="Choice 17">2017</option>
                                                                <option value="Choice 18">2018</option>
                                                                <option value="Choice 19">2019</option>
                                                                <option value="Choice 20" selected="">2020</option>
                                                                <option value="Choice 21">2021</option>
                                                                <option value="Choice 22">2022</option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobDescription" class="form-label">Job Description</label>
                                                    <textarea class="form-control" id="jobDescription" rows="3" placeholder="Enter description">You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you're working with reputable font websites. </textarea>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="hstack gap-2 justify-content-end">
                                                <a class="btn btn-success" href="javascript:deleteEl(1)">Delete</a>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div id="newForm" style="display: none;">

                                </div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="javascript:new_link()" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                                <!--end col-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="privacy" role="tabpanel">
                            <div class="mb-4 pb-2">
                                <h5 class="card-title text-decoration-underline mb-3">Security:</h5>
                                <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0">
                                    <div class="flex-grow-1">
                                        <h6 class="fs-14 mb-1">Two-factor Authentication</h6>
                                        <p class="text-muted">Two-factor authentication is an enhanced security meansur. Once enabled, you'll be required to give two types of identification when you log into Google Authentication and SMS are Supported.</p>
                                    </div>
                                    <div class="flex-shrink-0 ms-sm-3">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary">Enable Two-facor Authentication</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                    <div class="flex-grow-1">
                                        <h6 class="fs-14 mb-1">Secondary Verification</h6>
                                        <p class="text-muted">The first factor is a password and the second commonly includes a text with a code sent to your smartphone, or biometrics using your fingerprint, face, or retina.</p>
                                    </div>
                                    <div class="flex-shrink-0 ms-sm-3">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary">Set up secondary method</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                    <div class="flex-grow-1">
                                        <h6 class="fs-14 mb-1">Backup Codes</h6>
                                        <p class="text-muted mb-sm-0">A backup code is automatically generated for you when you turn on two-factor authentication through your iOS or Android Twitter app. You can also generate a backup code on twitter.com.</p>
                                    </div>
                                    <div class="flex-shrink-0 ms-sm-3">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary">Generate backup codes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5 class="card-title text-decoration-underline mb-3">Application Notifications:</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex">
                                        <div class="flex-grow-1">
                                            <label for="directMessage" class="form-check-label fs-14">Direct messages</label>
                                            <p class="text-muted">Messages from people you follow</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="directMessage" checked="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mt-2">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label fs-14" for="desktopNotification">
                                                Show desktop notifications
                                            </label>
                                            <p class="text-muted">Choose the option you want as your default setting. Block a site: Next to "Not allowed to send notifications," click Add.</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="desktopNotification" checked="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mt-2">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label fs-14" for="emailNotification">
                                                Show email notifications
                                            </label>
                                            <p class="text-muted"> Under Settings, choose Notifications. Under Select an account, choose the account to enable notifications for. </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="emailNotification">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mt-2">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label fs-14" for="chatNotification">
                                                Show chat notifications
                                            </label>
                                            <p class="text-muted">To prevent duplicate mobile notifications from the Gmail and Chat apps, in settings, turn off Chat notifications.</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="chatNotification">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mt-2">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label fs-14" for="purchaesNotification">
                                                Show purchase notifications
                                            </label>
                                            <p class="text-muted">Get real-time purchase alerts to protect yourself from fraudulent charges.</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="purchaesNotification">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="card-title text-decoration-underline mb-3">Delete This Account:</h5>
                                <p class="text-muted">Go to the Data &amp; Privacy section of your profile Account. Scroll to "Your data &amp; privacy options." Delete your Profile Account. Follow the instructions to delete your account :</p>
                                <div>
                                    <input type="password" class="form-control" id="passwordInput" placeholder="Enter your password" value="make@321654987" style="max-width: 265px;">
                                </div>
                                <div class="hstack gap-2 mt-3">
                                    <a href="javascript:void(0);" class="btn btn-soft-danger">Close &amp; Delete This Account</a>
                                    <a href="javascript:void(0);" class="btn btn-light">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

</div>
<!-- container-fluid -->


@endsection
@section('script')
<script>
    // Tự động đóng thông báo sau 5 giây (5000ms)
    setTimeout(function() {
        var alert = document.getElementById('thongbao-alert');
        if (alert) {
            // Sử dụng Bootstrap để đóng alert
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000); // 5000ms = 5 giây
</script>

@endsection

@section('style')
<style>
    .profile-photo-edit {
        position: absolute;
        bottom: 0;
        right: 0;
        cursor: pointer;
        background-color: #fff;
        /* Nền màu trắng */
        border-radius: 50%;
        /* Để phần tử thành hình tròn */
        border: 0.8px solid gray;
        /* Đường viền trắng */
        padding: 4px;
        /* Khoảng cách xung quanh icon */
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        /* Đặt kích thước của phần tử */
        height: 40px;
        /* Đặt kích thước của phần tử */
    }

    .profile-photo-edit .avatar-title {
        font-size: 24px;
        /* Kích thước của icon */
        line-height: 1;
        color: #000;
        /* Màu của icon, có thể thay đổi tùy theo ý thích */
    }

    .d-none {
        display: none;
    }
</style>
@endsection