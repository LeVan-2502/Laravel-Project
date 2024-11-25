@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Bình luận</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Danh sách bình luận</a></li>
            <li class="breadcrumb-item active">Bình luận</li>
        </ol>
    </div>

</div>
<div class="col-lg-12">
    @if (session('thongbao'))
    <div id="thongbao-alert" class="alert alert-{{ session('thongbao.type') }} alert-dismissible bg-{{ session('thongbao.type') }} text-white alert-label-icon fade show" role="alert">
        <i class="ri-notification-off-line label-icon"></i><strong> {{ session('thongbao.message') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
    @php
    session()->forget('thongbao');
    @endphp
    @endif
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0 d-flex align-items-center">
                            <i class="ri-account-box-fill me-1 text-muted fs-20"></i><strong>Thông tin khách hàng</strong>
                        </h5>
                        <div class="flex-shrink-0">
                            <a href="{{route('admin.tai_khoans.show', $binh_luan->tai_khoan_id)}}" class="btn btn-info">Xem chi tiết</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{\Storage::url($binh_luan->taiKhoan->hinh_anh)}}" alt="" class="avatar-sm rounded">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-1">{{$binh_luan->taiKhoan->ten_tai_khoan}}</h6>
                                    <p class="text-muted mb-0">{{$binh_luan->taiKhoan->email}}</p>
                                </div>
                            </div>
                        </li>
                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{$binh_luan->taiKhoan->dia_chi}}</li>
                        <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{$binh_luan->taiKhoan->so_dien_thoai}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0 d-flex align-items-center">
                            <i class="ri-account-box-fill me-1 text-muted fs-20"></i><strong>Thông tin sản phẩm</strong>
                        </h5>
                        <div class="flex-shrink-0">
                            <a href="{{route('admin.tai_khoans.show', $binh_luan->tai_khoan_id)}}" class="btn btn-info ">Xem chi tiết</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{\Storage::url($binh_luan->sanPham->hinh_anh)}}" alt="" class="avatar-sm rounded">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-1">{{$binh_luan->sanPham->ten_san_pham}}</h6>
                                    <p class="text-muted mb-0">{{$binh_luan->sanPham->danhMuc->ten_danh_muc}}</p>
                                </div>
                            </div>
                        </li>
                        <li><strong>Giá sản phẩm | </strong> {{$binh_luan->sanPham->gia}}</li>
                        <li><strong>Thương hiệu | </strong>{{$binh_luan->sanPham->thuong_hieu}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card" id="customerList">
        <div class="card-header border-bottom-dashed">

            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Chi tiết bình luận | <strong>ID {{ $binh_luan->id }}</strong></h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <a onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                            href="{{ route('admin.binh_luans.destroy', $binh_luan->id) }}"
                            class="btn btn-danger">
                            <i class="ri-delete-bin-7-line fs-16 me-2"></i> Xóa bình luận
                        </a>
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

                    <div class="row">

                        @if($binh_luan->phanHois->isNotEmpty() || $binh_luan->binhLuans->isNotEmpty())
                        <div class="comment-detail">
                            <div>
                                <div class="binh_luan">
                                    @if($binh_luan->binhLuans->count() > 0)
                                    <div class="replies">
                                        @include('admin.binh_luans.partial.comment', ['binh_luan' => $binh_luan->binhLuans])
                                    </div>
                                    @else
                                    <div class="phan-hois">
                                        @foreach($binh_luan->phanHois as $item)
                                        <p>{{ $item->noi_dung }}</p>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
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


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


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
<SCript>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện click vào nút "Sửa"
        document.querySelectorAll('.btn-binhluan').forEach(button => {
            button.addEventListener('click', function() {
                // Lấy dữ liệu từ thuộc tính data-*
                let id = this.getAttribute('data-id');
                let content = this.getAttribute('data-noi-dung');
                let status = this.getAttribute('data-trang-thai');
                let type = 'binhluan';
                // Điền dữ liệu vào các trường trong modal
                document.getElementById('id').value = id;
                document.getElementById('noi_dung').value = content;
                document.getElementById('trang_thai').value = status;
                document.getElementById('type').value = type;
                // Lưu id vào một input hidden hoặc xử lý khác nếu cần
                // document.getElementById('hiddenId').value = id;
            });
        });

    });
</SCript>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện click vào nút "Sửa"
        document.querySelectorAll('.btn-phanhoi').forEach(button => {
            button.addEventListener('click', function() {
                // Lấy dữ liệu từ thuộc tính data-*
                let id = this.getAttribute('data-id');
                let content = this.getAttribute('data-noi-dung');
                let status = this.getAttribute('data-trang-thai');
                let type = 'phanhoi';

                // Điền dữ liệu vào các trường trong modal
                document.getElementById('id').value = id;
                document.getElementById('noi_dung').value = content;
                document.getElementById('trang_thai').value = status;
                document.getElementById('type').value = type;

                // Lưu id vào một input hidden hoặc xử lý khác nếu cần
                // document.getElementById('hiddenId').value = id;
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Bắt sự kiện khi nhấn nút submit
        $('#update').on('click', function(e) {
            e.preventDefault();

            // Lấy giá trị từ form

            var type = $('#type').val();
            var id = $('#id').val();
            var noi_dung = $('#noi_dung').val();
            var trang_thai = $('#trang_thai').val();

            // Kiểm tra giá trị input (có thể kiểm tra thêm)
            if (!noi_dung || !trang_thai) {
                alert('Vui lòng nhập đầy đủ nội dung và trạng thái.');
                return;
            }

            // Gửi AJAX request
            $.ajax({
                url: '{{ url("admin/binh_luans/update/") }}',// Đường dẫn tới route xử lý cập nhật
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Đừng quên token bảo mật CSRF
                    id: id,
                    type: type,
                    noi_dung: noi_dung,
                    trang_thai: trang_thai
                },
                success: function(response) {
                    if (response.success) {
                        alert('Cập nhật thành công!');
                        window.location.reload();
                    } else {
                        alert('Có lỗi xảy ra, vui lòng thử lại sau.');
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Hiển thị lỗi nếu có
                    alert('Có lỗi xảy ra, vui lòng thử lại sau.');
                }
            });
        });
    });
</script>
<script>
    $(document).on('click', '.delete', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var type = $(this).data('type');
    

    if (confirm('Bạn có chắc chắn muốn xóa phản hồi này không?')) {
        $.ajax({
            url: '{{ url("admin/binh_luans/destroy/") }}',
            type: 'POST',
            data: {

                id: id,
                type: type,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.success);
                window.location.reload();
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    }
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
    .comment-detail {
        background-color: #f9f9f9;
        padding: 10px;
    }

    /* Tùy chỉnh accordion */
    #accordion .card {
        margin-bottom: 10px;
    }

    #accordion .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    #accordion .btn-link {
        display: flex;
        justify-content: space-between;
        text-decoration: none;
        color: #007bff;
    }

    #accordion .btn-link:hover {
        color: #0056b3;
    }

    #accordion .card-body {
        background-color: #ffffff;
        border-top: 1px solid #dee2e6;
    }

    .nested-comments {
        padding-left: 1.5rem;
    }

    .phan-hois .phan-hoi-item {
        background-color: #e9ecef;
    }
</style>
@endsection