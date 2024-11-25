@extends('admin.layouts.master')

@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Khuyến mãi</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Cập nhật thông tin khuyến mãi</a></li>
            <li class="breadcrumb-item active">Khuyến mãi</li>
        </ol>
    </div>
</div>

<form action="{{ route('admin.khuyen_mais.update', $khuyen_mai->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <!-- Form cập nhật khuyến mãi -->
        <div class="col-lg-6">
            <div class="card" id="customerList">
                <div class="card-header">
                    <h5 class="card-title mb-0">Cập nhật chương trình khuyến mãi</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Tên khuyến mãi -->
                        <div class="mb-3 col-12">
                            <label for="ten_khuyen_mai" class="form-label">Tên khuyến mãi</label>
                            <input value="{{ old('ten_khuyen_mai', $khuyen_mai->ten_khuyen_mai) }}" name="ten_khuyen_mai" type="text" id="ten_khuyen_mai" class="form-control" placeholder="Nhập tên khuyến mãi">
                            @error('ten_khuyen_mai')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Loại khuyến mãi -->
                        <div class="mb-3 col-6">
                            <label for="loai_khuyen_mai_id" class="form-label">Loại khuyến mãi</label>
                            <select class="form-select" id="loai_khuyen_mai_id" name="loai_khuyen_mai_id">
                                <option value="">-- Chọn loại khuyến mãi --</option>
                                @foreach($loai_khuyen_mais as $id => $ten)
                                    <option value="{{ $id }}" {{ $khuyen_mai->loai_khuyen_mai_id == $id ? 'selected' : '' }}>{{ $ten }}</option>
                                @endforeach
                            </select>
                            @error('loai_khuyen_mai_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Giá trị khuyến mãi -->
                        <div class="mb-3 col-6">
                            <label for="gia_tri_khuyen_mai" class="form-label">Giá trị</label>
                            <input value="{{ old('gia_tri_khuyen_mai', $khuyen_mai->gia_tri_khuyen_mai) }}" name="gia_tri_khuyen_mai" type="number" id="gia_tri_khuyen_mai" class="form-control" placeholder="Nhập giá trị khuyến mãi">
                            @error('gia_tri_khuyen_mai')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày bắt đầu -->
                        <div class="mb-3 col-6">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input value="{{ old('ngay_bat_dau', $khuyen_mai->ngay_bat_dau) }}" name="ngay_bat_dau" type="date" id="ngay_bat_dau" class="form-control">
                            @error('ngay_bat_dau')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày kết thúc -->
                        <div class="mb-3 col-6">
                            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                            <input value="{{ old('ngay_ket_thuc', $khuyen_mai->ngay_ket_thuc) }}" name="ngay_ket_thuc" type="date" id="ngay_ket_thuc" class="form-control">
                            @error('ngay_ket_thuc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3 col-12">
                            <label for="trang_thai" class="form-label">Trạng thái</label>
                            <select name="trang_thai" id="trang_thai" class="form-select">
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="1" {{ $khuyen_mai->trang_thai == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="2" {{ $khuyen_mai->trang_thai == 2 ? 'selected' : '' }}>Ngừng hoạt động</option>
                            </select>
                            @error('trang_thai')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả -->
                        <div class="mb-3 col-12">
                            <label for="mo_ta" class="form-label">Mô tả</label>
                            <textarea name="mo_ta" id="mo_ta" class="form-control" placeholder="Nhập mô tả">{{ old('mo_ta', $khuyen_mai->mo_ta) }}</textarea>
                            @error('mo_ta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="hstack gap-2">
                        <button type="submit" class="btn btn-success">Cập nhật khuyến mãi</button>
                        <a href="{{ route('admin.khuyen_mais.index') }}" class="btn btn-secondary">Đóng</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bảng điều kiện khuyến mãi -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Điều kiện khuyến mãi</h5>
                    <button type="button" onclick="addRow()" class="btn btn-success btn-sm">
                        <i class="ri-add-line align-bottom me-1"></i> Thêm điều kiện
                    </button>
                </div>
                <div class="card-body">
                    <table id="conditionsTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Tên điều kiện</th>
                                <th>Giá trị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $decodedDieuKien = json_decode($khuyen_mai->dieu_kien_ap_dung, true);
                            @endphp

                            @if(!empty($decodedDieuKien) && is_array($decodedDieuKien))
                                @foreach($decodedDieuKien as $key => $value)
                                    <tr>
                                        <td>
                                            <input value="{{ $key }}" class="form-control" name="ten_dk[]" type="text" placeholder="Tên điều kiện">
                                        </td>
                                        <td>
                                            <input value="{{ $value }}" class="form-control" name="gia_tri_dk[]" type="text" placeholder="Giá trị">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" onclick="removeRow(this)" class="btn btn-danger btn-sm">
                                                <i class="ri-delete-bin-7-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Không có điều kiện nào</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')
<!-- Sweet Alerts js -->
<script src="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    function addRow() {
        var tableBody = document.querySelector("#conditionsTable tbody");
        var newRow = document.createElement("tr");

        newRow.innerHTML = `
            <td>
                <input class="form-control" name="ten_dk[]" type="text" placeholder="Tên điều kiện">
            </td>
            <td>
                <input class="form-control" name="gia_tri_dk[]" type="text" placeholder="Giá trị">
            </td>
            <td class="text-center">
                <button type="button" onclick="removeRow(this)" class="btn btn-danger btn-sm">
                    <i class="ri-delete-bin-7-line"></i>
                </button>
            </td>
        `;
        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        var row = button.closest("tr");
        row.remove();
    }
</script>
@endsection

@section('style')
<link href="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
