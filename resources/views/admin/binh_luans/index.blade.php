@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Bình luận</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{route('admin.binh_luans.index')}}">Danh sách bình luận</a></li>
            <li class="breadcrumb-item active">Bình luận</li>
        </ol>
    </div>

</div>
<div class="col-lg-12">
    <div class="card" id="customerList">
        <div class="card-header border-bottom-dashed">

            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Danh sách bình luận</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <a href="{{ route('admin.binh_luans.create')}}" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm danh mục</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fw-semibold active" data-bs-toggle="tab" href="#productnav-all" role="tab" aria-selected="true">
                                <i class=" ri-layout-top-2-fill me-2 align-middle text-info fs-16"></i>Tất cả
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#new" role="tab" aria-selected="true">
                                <i class="ri-grid-fill me-2 align-middle text-danger fs-16"></i>Bình luận mới
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#hidden" role="tab" aria-selected="true">
                                <i class="ri-grid-fill me-2 align-middle text-danger fs-16"></i>Bình luận đã ẩn
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-auto">
                    <div id="selection-element" style="display: none;">
                        <div class="my-n1 d-flex align-items-center text-muted">
                            Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="deleteForm" action="{{ route('admin.binh_luans.delete-selected') }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="card-body">
                <!-- Success Alert -->


                <div>
                    @if (session('thongbao'))
                    <div id="thongbao-alert" class="alert alert-{{ session('thongbao.type') }} alert-dismissible bg-{{ session('thongbao.type') }} text-white alert-label-icon fade show" role="alert">
                        <i class="ri-notification-off-line label-icon"></i><strong> {{ session('thongbao.message') }}</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                    @php
                    session()->forget('thongbao');
                    @endphp
                    @endif
                    <div class="mb-1 mt-2">
                        <div class="tab-content text-muted">
                            <div class="tab-pane active show" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    <table id="comments-table" class="table table-bordered dt-responsive nowrap table-striped align-middle" class="display" style="width:100%; color:black">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th>ID</th>
                                                <th>Người dùng</th>
                                                <th>Sản phẩm</th>
                                                <th>Bài viết</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach($binh_luan_goc as $index => $binh_luan)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $binh_luan->id }}">
                                                    </div>
                                                </th>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $binh_luan->taiKhoan->ten_tai_khoan ?? 'N/A' }}</td>
                                                <td>{{ $binh_luan->sanPham->ten_san_pham ?? 'N/A' }}</td>
                                                <td>{{ $binh_luan->noi_dung }}</td>
                                                <td>{{ $binh_luan->trang_thai }}</td>
                                                <td>
                                                    <a href="{{ route('admin.binh_luans.show', $binh_luan->id)}}" class="btn btn-secondary btn-icon waves-effect waves-light btn-sm ">
                                                        <i class="  ri-menu-add-line fs-16"></i>
                                                    </a>
                                                    <a onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                                                        href="{{ route('admin.binh_luans.destroy', $binh_luan->id) }}"
                                                        class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                                                        <i class="ri-delete-bin-7-line fs-16"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content text-muted">
                            <div class="tab-pane show" id="new" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    <table id="new-comment" class="table table-bordered dt-responsive nowrap table-striped align-middle" class="display" style="width:100%; color:black">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th>ID</th>
                                                <th>Người dùng</th>
                                                <th>Sản phẩm</th>
                                                <th>Nội dung</th>
                                                <th>Bình luận gốc</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach($binh_luan_moi as $index => $binh_luan)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $binh_luan->id }}">
                                                    </div>
                                                </th>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $binh_luan->taiKhoan->ten_tai_khoan ?? 'N/A' }}</td>
                                                <td>{{ $binh_luan->sanPham->ten_san_pham ?? 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.binh_luans.show', $goc_moi[$index])}}" class="btn btn-warning btn-sm ">
                                                        ID | {{ $goc_moi[$index] ?? 'N/A' }}
                                                    </a>

                                                <td>{{ $binh_luan->trang_thai }}</td>
                                                <td>
                                                    <a href="{{ route('admin.binh_luans.show', $binh_luan->id)}}" class="btn btn-secondary btn-icon waves-effect waves-light btn-sm ">
                                                        <i class="  ri-menu-add-line fs-16"></i>
                                                    </a>
                                                    <a onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                                                        href="{{ route('admin.binh_luans.destroy', $binh_luan->id) }}"
                                                        class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                                                        <i class="ri-delete-bin-7-line fs-16"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach
                                            @foreach($phan_hoi_moi as $index => $phan_hoi)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $phan_hoi->id }}">
                                                    </div>
                                                </th>
                                                <td>{{ $index }}</td>
                                                <td>{{ $phan_hoi->taiKhoan->ten_tai_khoan ?? 'N/A' }}</td>
                                                <td>{{ $phan_hoi->sanPham->ten_san_pham ?? 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.binh_luans.show',$phan_hoi->binhLuan->id ?? 'N/A' )}} " class="btn btn-warning btn-sm ">
                                                        ID | {{ $phan_hoi->binhLuan->id ?? 'N/A' }}
                                                    </a>

                                                <td>{{ $phan_hoi->trang_thai }}</td>
                                                <td>
                                                    <a href="{{ route('admin.binh_luans.show', $phan_hoi->id)}}" class="btn btn-secondary btn-icon waves-effect waves-light btn-sm ">
                                                        <i class="  ri-menu-add-line fs-16"></i>
                                                    </a>
                                                    <a onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                                                        href="{{ route('admin.binh_luans.destroy', $phan_hoi->id) }}"
                                                        class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                                                        <i class="ri-delete-bin-7-line fs-16"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content text-muted">
                            <div class="tab-pane show" id="hidden" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    <table id="hidden-comment" class="table table-bordered dt-responsive nowrap table-striped align-middle" class="display" style="width:100%; color:black">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th>ID</th>
                                                <th>Người dùng</th>
                                                <th>Sản phẩm</th>
                                                <th>Nội dung</th>
                                                <th>Bình luận gốc</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach($binh_luan_an as $index => $binh_luan)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $binh_luan->id }}">
                                                    </div>
                                                </th>
                                                <td>{{  $binh_luan->id }}</td>
                                                <td>{{ $binh_luan->taiKhoan->ten_tai_khoan ?? 'N/A' }}</td>
                                                <td>{{ $binh_luan->sanPham->ten_san_pham ?? 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.binh_luans.show', $goc_an[$index])}}" class="btn btn-warning btn-sm ">
                                                        ID | {{ $goc_an[$index] ?? 'N/A' }}
                                                    </a>

                                                <td>{{ $binh_luan->trang_thai }}</td>
                                                <td>
                                                    <a href="{{ route('admin.binh_luans.show', $binh_luan->id)}}" class="btn btn-secondary btn-icon waves-effect waves-light btn-sm ">
                                                        <i class="  ri-menu-add-line fs-16"></i>
                                                    </a>
                                                    <a onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                                                        href="{{ route('admin.binh_luans.destroy', $binh_luan->id) }}"
                                                        class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                                                        <i class="ri-delete-bin-7-line fs-16"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" type="submit" name="deleteSelected" class="btn btn-danger">
                            Xóa nhiều
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script-lib')
<script src="{{ asset('theme/velzon/theme/velzon/assets/libs/list.js/list.min.js')}}"></script>
<script src="{{ asset('theme/velzon/theme/velzon/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>
<script src="{{ asset('theme/velzon/assets/libs/list.js/list.min.js')}}"></script>
<script src="{{ asset('theme/velzon/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

<!--ecommerce-customer init js -->
<script src="{{ asset('theme/velzon/assets/js/pages/ecommerce-customer-list.init.js')}}"></script>


<!-- Sweet Alerts js -->


<!-- Sweet alert init js-->
<script src="{{ asset('theme/velzon/assets/js/pages/sweetalerts.init.js')}}"></script>

<script src="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function() {
    function initializeDataTable(tableId) {
        $(tableId).DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10,
            "lengthMenu": [5, 10, 25, 50, 100],
            "order": [
                [0, 'asc']
            ],
            "language": {
                "search": "Tìm kiếm",
                "lengthMenu": "Hiển thị _MENU_ bản ghi",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Sau",
                    "previous": "Trước"
                }
            },
            "responsive": true,
            "autoWidth": false,
            "initComplete": function() {
                $('.dataTables_filter input[type="search"]').addClass('form-control form-control-xl');
                $('.dataTables_length select').addClass('form-control form-control-xl');
            }
        });
    }

    // Khởi tạo DataTable cho các bảng khác nhau
    initializeDataTable('#comments-table');
    initializeDataTable('#new-comment');
    initializeDataTable('#hidden-comment');
});

</script>

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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const detailButtons = document.querySelectorAll('.detail-btn');

        detailButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const commentDetailRow = this.closest('tr').nextElementSibling;

                if (commentDetailRow && commentDetailRow.classList.contains('comment-detail')) {
                    if (commentDetailRow.style.display === 'none' || commentDetailRow.style.display === '') {
                        commentDetailRow.style.display = 'table-row';
                        this.innerHTML = '<i class="ri-menu-fold-line fs-16"></i>';
                    } else {
                        commentDetailRow.style.display = 'none';
                        this.innerHTML = '<i class="ri-menu-add-line fs-16"></i>';
                    }
                }
            });
        });
    });
</script>
<script>
    document.getElementById('deleteForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = event.target;

        // Tạo một form giả lập để gửi yêu cầu DELETE
        var deleteForm = document.createElement('form');
        deleteForm.action = form.action;
        deleteForm.method = 'POST';

        // Thêm token CSRF
        var csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        deleteForm.appendChild(csrfToken);

        // Thêm trường để giả lập DELETE
        var deleteMethod = document.createElement('input');
        deleteMethod.type = 'hidden';
        deleteMethod.name = '_method';
        deleteMethod.value = 'DELETE';
        deleteForm.appendChild(deleteMethod);

        // Thêm các checkbox được chọn vào form mới
        var checkboxes = form.querySelectorAll('input[name="ids[]"]:checked');
        checkboxes.forEach(function(checkbox) {
            var hiddenCheckbox = document.createElement('input');
            hiddenCheckbox.type = 'hidden';
            hiddenCheckbox.name = 'ids[]';
            hiddenCheckbox.value = checkbox.value;
            deleteForm.appendChild(hiddenCheckbox);
        });

        document.body.appendChild(deleteForm);
        deleteForm.submit();
    });
</script>


@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<link href="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .dataTables_wrapper .dataTables_filter input {
        margin-left: 5px;
        width: 200px;
    }

    /* Đảm bảo dropdown và input có khoảng cách hợp lý */

    .dataTables_wrapper .dataTables_filter input {
        margin-left: 10px;
        display: inline-block;
    }

    /* Tùy chỉnh phân trang */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: .375rem .75rem;
        margin-left: 2px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #ffffff !important;
        color: #219ebc !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #219ebc !important;
        color: #ffffff !important;
    }


    /* Tùy chỉnh các văn bản nhỏ */


    /* Tùy chỉnh các thành phần khác của DataTable */
    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #495057;
        font-size: 0.8rem;
    }
</style>
@endsection