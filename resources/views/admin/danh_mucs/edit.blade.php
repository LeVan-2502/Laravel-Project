@extends('admin.layouts.master')
@section('title')

@endsection
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Danh mục</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Cập nhật danh mục</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>
    </div>

</div>
<div class="col-lg-12">
    <div class="card" id="customerList">
        <div class="card-header border-bottom-dashed">

            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Cập nhật danh mục {{ $model->ten_danh_muc}}</h5>
                    </div>
                </div>
            </div>
        </div>



        <form action="{{ route('admin.danh_mucs.update', $model->id) }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="body row">
                    <div class="col-3">
                        <div class="mb-3 col-12">
                            @if($model->hinh_anh)
                            <img src="{{ \Storage::url($model->hinh_anh) }}" width="100%" alt="Hình ảnh danh mục">
                            @endif
                            <label for="hinh_anh" class="form-label">Hình ảnh</label>
                            <input name="hinh_anh" type="file" id="hinh_anh" class="form-control">

                            @error('hinh_anh')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="mb-3 col-12">
                            <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                            <input value="{{ $model->ten_danh_muc}}" name="ten_danh_muc" type="text" id="ten_danh_muc" class="form-control" placeholder="Enter name">
                            @error('ten_danh_muc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <label for="slug" class="form-label">Slug</label>
                            <input value="{{ $model->slug}}" name="slug" type="text" id="slug" class="form-control" placeholder="Enter slug">
                            @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <label for="trang_thai" class="form-label">Trạng thái</label>
                            <select value="{{ $model->trang_thai}}" name="trang_thai" id="trang_thai" class="form-control">
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="1" selected>Hoạt động</option>
                                <option value="2">Ngừng hoạt động</option>
                            </select>
                            @error('trang_thai')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="hstack gap-2 justify-content-left">
                    <button type="submit" class="btn btn-success" id="add-btn">Cập nhật danh mục</button>
                    <a href="{{ route('admin.danh_mucs.index') }}" class="btn btn-light">Đóng</a>
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