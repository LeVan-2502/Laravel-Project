@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">{{$table}}</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Thêm mới {{$table}}</a></li>
            <li class="breadcrumb-item active">{{$table}}</li>
        </ol>
    </div>

</div>
<div class="col-lg-12">
    <div class="card" id="customerList">
        <div class="card-header border-bottom-dashed">

            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Thêm mới {{$table}}</h5>
                    </div>
                </div>
            </div>
        </div>



        <form action="{{ route('admin.tai_khoans.store') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="body row">
                    <div class="mb-3 col-6">
                        <label for="ten_tai_khoan" class="form-label">Tên tài khoản</label>
                        <input value="{{ old('ten_tai_khoan') }}" name="ten_tai_khoan" type="text" id="ten_tai_khoan" class="form-control" placeholder="Enter name">
                        @error('ten_tai_khoan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="email" class="form-label">Email</label>
                        <input value="{{ old('email') }}" name="email" type="text" id="email" class="form-control" placeholder="Enter email">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-6">
                        <label for="password" class="form-label">Password</label>
                        <input value="{{ old('password') }}" name="password" type="password" id="password" class="form-control" placeholder="Enter password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-6">
                        <label for="password" class="form-label">Xác nhận password</label>
                        <input value="{{ old('re_password') }}" name="re_password" type="password" id="re_password" class="form-control" placeholder="Enter password">
                        @error('re_password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-6">
                        <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                        <input value="{{ old('so_dien_thoai') }}" name="so_dien_thoai" type="text" id="so_dien_thoai" class="form-control" placeholder="Enter so_dien_thoai">
                        @error('so_dien_thoai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-6">
                        <label for="dia_chi" class="form-label">Địa chỉ</label>
                        <input value="{{ old('dia_chi') }}" name="dia_chi" type="text" id="dia_chi" class="form-control" placeholder="Enter dia_chi">
                        @error('dia_chi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-12">
                        <label for="gioi_thieu" class="form-label">Giới thiệu</label>
                        <input value="{{ old('gioi_thieu') }}" name="gioi_thieu" type="text" id="gioi_thieu" class="form-control" placeholder="Enter gioi_thieu">
                        @error('gioi_thieu')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-6">
                        <label for="password" class="form-label">Giới tính</label>
                        <select class="form-control" name="gioi_tinh" id="">
                            <option value="">--Chọn giới tính--</option>
                            <option value="1" {{ old('gioi_tinh') == '1' ? 'selected' : '' }}>Nam</option>
                            <option value="2" {{ old('gioi_tinh') == '2' ? 'selected' : '' }}>Nữ</option>
                            <option value="3" {{ old('gioi_tinh') == '3' ? 'selected' : '' }}>Khác</option>
                        </select>
                        @error('gioi_tinh')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3 col-6">
                        <label for="vai_tro_id" class="form-label">Vai trò</label>
                        <select value="{{ old('vai_tro_id') }}" name="vai_tro_id" id="" class="form-control">
                            <option value="">--Chọn vai trò--</option>
                            @foreach($vai_tros as $item)
                            <option value="{{$item->id}}" {{ old('vai_tro_id') == $item->id ? 'selected' : '' }}>{{$item->ten_vai_tro}}</option>
                            @endforeach
                        </select>
                        @error('vai_tro_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-6">
                        <label for="hinh_anh" class="form-label">Hình ảnh</label>
                        <input name="hinh_anh" type="file" id="hinh_anh" class="form-control">

                        <!-- Hiển thị hình ảnh cũ nếu có -->
                        @if(session('hinh_anh_cu'))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . session('hinh_anh_cu')) }}" alt="Hình ảnh cũ" style="max-width: 100px; max-height: 100px;">
                        </div>
                        @endif


                        <!-- Hiển thị thông báo lỗi xác thực -->
                        @error('hinh_anh')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 col-6">
                        <label for="trang_thai" class="form-label">Trạng thái</label>
                        <select value="{{ old('trang_thai') }}" name="trang_thai" id="trang_thai" class="form-control">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1" selected>Hoạt động</option>
                            <option value="2">Tạm dừng</option>
                        </select>
                        @error('trang_thai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="trang_thai" class="form-label">Trạng thái</label>
                        <select value="{{ old('trang_thai') }}" name="trang_thai" id="trang_thai" class="form-control">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1" selected>Hoạt động</option>
                            <option value="2">Tạm dừng</option>
                        </select>
                        @error('trang_thai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="hstack gap-2 justify-content-left">
                    <button type="submit" class="btn btn-success" id="add-btn">Thêm {{$table}}</button>
                  
                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                </div>
            </div>
        </form>
    </div>


</div>

</div>
@endsection
@section('script-lib')
<script src="http://chiccorner-project.test/theme/velzon/assets/libs/list.js/list.min.js"></script>
<script src="http://chiccorner-project.test/theme/velzon/assets/libs/list.pagination.js/list.pagination.min.js"></script>
<script src="{{ asset('theme/velzon/assets/libs/list.js/list.min.js')}}"></script>
<script src="{{ asset('theme/velzon/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

<!--ecommerce-customer init js -->
<script src="{{ asset('theme/velzon/assets/js/pages/ecommerce-customer-list.init.js')}}"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

@endsection
@section('script')
<script>
    document.getElementById('ten_danh_muc').addEventListener('input', function() {
        // Lấy giá trị từ ô nhập liệu Tên danh mục
        var tenDanhMuc = this.value;

        // Chuyển đổi Tên danh mục thành Slug
        var slug = tenDanhMuc.toLowerCase()
            .normalize('NFD') // Chuẩn hóa Unicode để xử lý các ký tự tiếng Việt
            .replace(/[\u0300-\u036f]/g, '') // Xóa các dấu phụ
            .replace(/[^a-z0-9\s-]/g, '') // Xóa các ký tự đặc biệt không phải chữ cái Latin hoặc số
            .replace(/\s+/g, '-') // Thay thế khoảng trắng bằng dấu gạch ngang
            .replace(/-+/g, '-'); // Loại bỏ các dấu gạch ngang thừa

        // Gán giá trị Slug vào ô nhập liệu Slug
        document.getElementById('slug').value = slug;
    });
</script>


@endsection
@section('style')
<link href="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection