@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Banner</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Thêm mới chương trình banner</a></li>
            <li class="breadcrumb-item active">Banner</li>
        </ol>
    </div>

</div>
<form action="{{ route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
    <div class="row">

        @csrf
        <div class="col-lg-4">
            <div class="card" id="customerList">
                <div class="card-header">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Thêm mới chương trình banner</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="body row">
                        <div class="mb-3 col-12">
                            <label for="ten" class="form-label">Tên chương trình</label>
                            <input value="{{ old('ten') }}" name="ten" type="text" id="ten" class="form-control" placeholder="Enter name">
                            @error('ten')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="mb-3 col-6">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input value="{{ old('ngay_bat_dau') }}" name="ngay_bat_dau" type="date" id="ngay_bat_dau" class="form-control" placeholder="Enter name">
                            @error('ngay_bat_dau')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                            <input value="{{ old('ngay_ket_thuc') }}" name="ngay_ket_thuc" type="date" id="ngay_ket_thuc" class="form-control" placeholder="Enter name">
                            @error('ngay_ket_thuc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <label for="trang_thai" class="form-label">Trạng thái</label>
                            <select name="trang_thai" id="trang_thai" class="form-control">
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="1" selected>Hoạt động</option>
                                <option value="2">Ngừng hoạt động</option>
                            </select>
                            @error('trang_thai')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <label for="mo_ta" class="form-label">Mô tả</label>
                        <textarea value="{{ old('mo_ta') }}" name="mo_ta" type="text" id="mo_ta" class="form-control" placeholder="Enter name"></textarea>
                        @error('mo_ta')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <div class="hstack gap-2 justify-content-left">
                        <button type="submit" class="btn btn-success" id="add-btn">Thêm danh mục</button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-light">Đóng</a>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Danh sách banner</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <a href="#" onclick="addRow()" class="btn btn-success add-btn btn-sm"><i class="ri-add-line align-bottom me-1"></i>Thêm banner</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="conditionsTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                
                                <th style="width: 15%;">Vị trí</th>
                                <th style="width: 50%;">Tiêu đề</th>
                                <th style="width: 30%;">Hình ảnh</th>
                                <th style="width: 5%;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                               
                                <th style="width: 15%;">Vị trí</th>
                                <th style="width: 50%;">Tiêu đề</th>
                                <th style="width: 30%;">Hình ảnh</th>
                                <th style="width: 5%;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                               
                                <td>
                                    <input class="form-control" name="thu_tu[]" type="text">
                                </td>
                                <td>
                                    <input class="form-control" name="tieu_de[]" type="text">
                                </td>
                                <td>
                                    <input class="form-control" name="hinh_anh[]" type="file">
                                </td>
                                <td>
                                    <a href="#" onclick="removeRow(this)" class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                                        <i class="ri-delete-bin-7-line fs-16"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</form>


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
<script>
    function addRow() {
        // Tạo một dòng mới
        var table = document.getElementById("conditionsTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow();

        // Tạo các ô và thêm chúng vào dòng mới
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);

      
        cell1.innerHTML = '<input class="form-control" name="thu_tu[]" type="text">';
        cell2.innerHTML = '<input class="form-control" name="tieu_de[]" type="text">';
        cell3.innerHTML = '<input class="form-control" name="hinh_anh[]" type="file">';
        cell4.innerHTML = '<button onclick="removeRow(this)" class="btn btn-danger btn-icon waves-effect waves-light btn-sm"><i class="ri-delete-bin-7-line fs-16"></i></button>';
    }

    function removeRow(button) {
        // Xóa dòng hiện tại
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>
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