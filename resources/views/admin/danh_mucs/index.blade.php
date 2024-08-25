@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Danh mục</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Danh sách danh mục</a></li>
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
                        <h5 class="card-title mb-0">Danh sách danh mục</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <a href="{{ route('admin.danh_mucs.create')}}" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm danh mục</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border-bottom-dashed border-bottom">
            <form method="GET">
                @csrf
                <div class="row g-3">
                    <div class="col-xl-6">
                        <div class="search-box">
                            <input type="text" class="form-control search" placeholder="Search for customer, email, phone, status or something...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xl-6">
                        <div class="row g-3">
                            <div class="col-sm-4">
                            </div>
                            <!--end col-->
                            <div class="col-sm-4">
                                <div>
                                    <select class="form-control" name="trang_thai" id="idStatus">
                                        <option value="">All trạng thái</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Ngừng hoạt động</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <button type="submit" class="btn btn-primary w-100"></i>Filters</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
                <!--end row-->
            </form>
        </div>
        <form id="deleteForm" action="{{ route('admin.danh_mucs.delete-selected') }}" method="POST">
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
                    <div class="table-responsive table-card mb-1 mt-2">
                        <table class="table align-middle" id="danhmucTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>

                                    <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" data-sort="ten_danh_muc">Tên danh mục</th>
                                    <th class="sort" data-sort="mo_ta">Slug</th>
                                    <th class="sort" data-sort="mo_ta">Hình ảnh</th>
                                    <th class="sort" data-sort="mo_ta">Trang thái</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($data as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $item->id }}">
                                        </div>
                                    </th>
                                    <td class="id">{{ $item->id }}</td>
                                    <td class="ten_danh_muc">{{ $item->ten_danh_muc }}</td>
                                    <td class="slug">{{ $item->slug }}</td>
                                    <td class="hinh_anh">
                                        @if (!empty($item->hinh_anh))
                                        <img src="{{ \Storage::url($item->hinh_anh) }}" width="50px" alt="Hình ảnh danh mục">
                                        @else
                                        <span>Không có hình ảnh</span>
                                        @endif
                                    </td>
                                    <td class="trang_thai">
                                        @if ($item->trang_thai == 1)
                                        <span class="badge bg-primary">Hoạt động</span>
                                        @else
                                        <span class="badge bg-danger">Ngừng hoạt động</span>
                                        @endif
                                    </td>


                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <!-- Edit Button -->
                                            <li class="list-inline-item edit" title="Edit">
                                                <a href="{{ route('admin.danh_mucs.edit', $item->id)}}" class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <!-- Remove Button -->
                                            <li class="list-inline-item" title="Remove">
                                                <a onclick="return confirm('Bạn đã chắc chắn chưa?')" href="{{ route('admin.danh_mucs.destroy', $item->id) }}">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
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
                                <lord-icon src="{{ asset('theme/velzon/https://cdn.lordicon.com/msoeawqm.json')}}" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ customer We did not find any customer for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" type="submit" name="deleteSelected" class="btn btn-danger">
                            Xóa nhiều
                        </button>
                        <div class="pagination-wrap hstack gap-2" style="display: flex;">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0">
                                <li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li>
                                <li><a class="page" href="#" data-i="2" data-page="8">2</a></li>
                            </ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<!-- Sweet Alerts js -->


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


@endsection

@section('style')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<link href="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection