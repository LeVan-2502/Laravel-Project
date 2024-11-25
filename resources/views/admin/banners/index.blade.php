@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Banners</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.banners.index') }}">Banners</a>
            </li>

            <li class="breadcrumb-item active">Danh sách banners</li>
        </ol>
    </div>

</div>
<div class="col-lg-12">
    <div class="card" id="customerList">
        <div class="card-header border-bottom-dashed">

            <div class="row g-4 align-items-center">

                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Danh sách banners</h5>
                    </div>
                </div>
                <div class="col-sm-auto d-flex gap-2">
                    <button onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" type="submit" name="deleteSelected" class="btn btn-danger">
                        Xóa nhiều
                    </button>
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <a href="{{ route('admin.banners.create')}}" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm mới chương trình</a>
                    </div>
                </div>
            </div>
        </div>

        <form id="deleteForm" action="{{ route('admin.banners.delete-selected') }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="card-body">
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
                    <div class="table-responsive table-card mb-1 mt-2">
                        <table class="table align-middle" id="example">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Mã</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot class="table-light text-muted">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Mã</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody class="list form-check-all">
                                @foreach($data->banners as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $item->id }}">
                                        </div>
                                    </th>
                                    <td class="id">{{ $item->id }}</td>
                                    <td class="hinh_anh">
                                        @if (!empty($item->hinh_anh))
                                        <img src="{{ \Storage::url($item->hinh_anh) }}" width="150px" alt="Hình ảnh danh mục">
                                        @else
                                        <img src="{{ asset('he_thongs/avatar_default.jpeg') }}" width="150px" alt="Hình ảnh danh mục">

                                        @endif
                                    </td>
                                   
                                    <td class="email">{{ $item->ma }}</td>
                                    <td class="email">{{ $item->ten }}</td>
                                    <td class="trang_thai">
                                        @if ($item->trang_thai == 1)
                                        <span class="badge bg-success">Hoạt động</span>
                                        @else
                                        <span class="badge bg-danger">Tạm dừng</span>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="list-inline hstack gap-1 mb-0">
                                            <li class="list-inline-item edit" title="Sửa">
                                                <a
                                                    href="{{ route('admin.banners.edit', $item->id)}}"
                                                    class="btn btn-warning btn-icon waves-effect waves-light btn-sm">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item edit" title="Xóa">
                                                <a
                                                    onclick="return confirm('Khi bạn xác nhận mọi thông tin dữ liệu liên quan đều bị xóa')"
                                                    href="{{ route('admin.banners.destroy', $item->id)}}"
                                                    class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                                                    <i class="ri-delete-bin-7-line fs-16"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ customer We did not find any customer for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
@section('script-lib')




<!-- Sweet alert init js-->
<script src="{{ asset('theme/velzon/assets/js/pages/sweetalerts.init.js')}}"></script>

<script src="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Hiển thị từ _START_ đến _END_ của _TOTAL_ bản ghi",
                "search": "Tìm kiếm:",
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Tiếp",
                    "previous": "Trước"
                }
            }
        });
    });
</script>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
<style>
    /* Căn chỉnh bảng */
    table.dataTable {
        width: 100%;
        border-collapse: collapse;
        /* Giảm khoảng cách giữa các ô */
        margin: 20px 0;
        /* Khoảng cách từ trên và dưới bảng */
    }

    /* Định dạng hàng tiêu đề */
    table.dataTable thead th {
        background-color: #6c757d;

        color: white;

        padding: 10px;
        /* Khoảng cách bên trong */
        text-align: left;
        /* Căn trái cho nội dung */
    }

    /* Định dạng hàng dữ liệu */
    table.dataTable tbody tr {
        background-color: #f9f9f9;
        /* Màu nền cho hàng dữ liệu */
        border-bottom: 1px solid #ddd;
        /* Đường viền dưới cho hàng dữ liệu */
    }

    table.dataTable tbody tr:hover {
        background-color: #f1f1f1;
        /* Màu nền khi di chuột qua hàng */
    }

    /* Định dạng ô dữ liệu */
    table.dataTable tbody td {
        padding: 10px;
        /* Khoảng cách bên trong */
        text-align: left;
        /* Căn trái cho nội dung */
    }

    /* Định dạng cho phân trang */
    .dataTables_wrapper .dataTables_paginate {
        margin-top: 20px;
        /* Khoảng cách trên của phần phân trang */
    }

    /* Định dạng cho ô tìm kiếm */
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ccc;
        /* Đường viền ô tìm kiếm */
        padding: 5px;
        /* Khoảng cách bên trong */
        margin-left: 10px;
        /* Khoảng cách từ chữ "Tìm kiếm:" */
    }


    .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
    .dataTables_wrapper .dataTables_paginate .paginate_button.next {
        font-weight: bold;
        /* Chữ đậm cho nút trước và sau */
    }
</style>
@endsection