@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Khuyến mãi</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Thêm mới khuyến mãi</a></li>
            <li class="breadcrumb-item active">Khuyến mãi</li>
        </ol>
    </div>

</div>
<form action="{{ route('admin.khuyen_mais.store')}}" method="post">
<div class="row">
   
        @csrf
        <div class="col-lg-6">
            <div class="card" id="customerList">
                <div class="card-header">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Thêm mới chương trình khuyến mãi</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="body row">
                        <div class="mb-3 col-12">
                            <label for="ten_khuyen_mai" class="form-label">Tên khuyến mãi</label>
                            <input value="{{ old('ten_khuyen_mai') }}" name="ten_khuyen_mai" type="text" id="ten_khuyen_mai" class="form-control" placeholder="Enter name">
                            @error('ten_khuyen_mai')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="choices-publish-status-input" class="form-label">Loại khuyến mãi</label>
                            <select class="form-select" id="loai_khuyen_mai_id" name="loai_khuyen_mai_id" data-choices="" data-choices-search-false="">
                                <option value="">--Loại khuyến mãi</option>
                                @foreach($loai_khuyen_mais as $id => $ten)
                                <option value="{{$id}}">{{$ten}}</option>
                                @endforeach
                            </select>
                            @error('loai_khuyen_mai_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="gia_tri_khuyen_mai" class="form-label">Giá trị</label>
                            <input value="{{ old('gia_tri_khuyen_mai') }}" name="gia_tri_khuyen_mai" type="text" id="gia_tri_khuyen_mai" class="form-control" placeholder="Enter name">
                            @error('gia_tri_khuyen_mai')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input value="{{ old('ngay_bat_dau') }}" name="ngay_bat_dau" type="date" id="ngay_bat_dau" class="form-control" placeholder="Enter name">
                            @error('ngay_bat_dau')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                            <input value="{{ old('ngay_ket_thuc') }}" name="ngay_ket_thuc" type="date" id="ngay_ket_thuc" class="form-control" placeholder="Enter name">
                            @error('ngay_ket_thuc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
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
                        <a href="{{ route('admin.khuyen_mais.index') }}" class="btn btn-light">Đóng</a>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Điều kiện khuyến mãi</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <a href="#" onclick="addRow()" class="btn btn-success add-btn btn-sm"><i class="ri-add-line align-bottom me-1"></i>Thêm điều kiện</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="conditionsTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Tên điều kiện</th>
                                <th>Giá trị</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input class="form-control" name="ten_dk[]" type="text">
                                </td>
                                <td>
                                    <input class="form-control" name="gia_tri_dk[]" type="text">
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

        cell1.innerHTML = '<input class="form-control" name="ten_dk[]" type="text">';
        cell2.innerHTML = '<input class="form-control" name="gia_tri_dk[]" type="text">';
        cell3.innerHTML = '<button onclick="removeRow(this)" class="btn btn-danger btn-icon waves-effect waves-light btn-sm"><i class="ri-delete-bin-7-line fs-16"></i></button>';
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