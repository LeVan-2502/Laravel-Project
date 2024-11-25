@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Đơn hàng</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{route('admin.don_hangs.index')}}">Danh sách đơn hàng</a></li>
            <li class="breadcrumb-item active">Đơn hàng</li>
        </ol>
    </div>

</div>
<div class="col-lg-12">
    @if (session('thongbao'))
    <div id="thongbao-alert" class="alert alert-{{ session('thongbao.type') }} alert-dismissible bg-{{ session('thongbao.type') }} text-white alert-label-icon fade show" role="alert">
        @if(session('thongbao.type')=='success')
        <i style="font-size: 24px;" class="ri-checkbox-circle-fill label-icon"></i>
        @else
        <i style="font-size: 24px;" class="ri-close-circle-fill label-icon"></i>
        @endif
        <strong> {{ session('thongbao.message') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
    @php
    session()->forget('thongbao');
    @endphp
    @endif
    <div class="card">

        <div class="card-header">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Danh sách đơn hàng</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <a href="{{ route('admin.don_hangs.create')}}" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Tạo đơn hàng mới</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link kho fw-semibold active" data-bs-toggle="tab" href="#productnav-all" role="tab" aria-selected="true">
                                <i class=" ri-layout-top-2-fill me-2 align-middle text-info fs-16"></i>Tất cả
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link kho text-black" data-bs-toggle="tab" href="#" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-grid-fill me-2 align-middle text-danger fs-16"></i><strong>Hết hàng</strong>
                                <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1"></span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link kho text-black" data-bs-toggle="tab" href="#" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-grid-fill me-2 align-middle text-danger fs-16"></i><strong>Chờ hàng</strong>
                                <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1"></span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link kho text-black" data-bs-toggle="tab" href="#" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-grid-fill me-2 align-middle text-danger fs-16"></i><strong>Hàng sắp hết</strong>
                                <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1"></span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link kho text-black" data-bs-toggle="tab" href="#" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-grid-fill me-2 align-middle text-danger fs-16"></i><strong>Còn hàng</strong>
                                <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1"></span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <form id="deleteForm" action="{{ route('admin.don_hangs.delete-selected') }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane active show" id="productnav-all" role="tabpanel">
                        <div id="table-product-list-all" class="table-card gridjs-border-none">
                            <table class="table align-middle" id="example1">
                                <thead class="table-primary text-muted">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Tồn kho</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-primary text-muted">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Tồn kho</th>
                                    </tr>
                                </tfoot>
                                <tbody class="list form-check-all">
                                    @foreach($data as $item)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $item->id }}">
                                            </div>
                                        </th>
                                        <td class="id">{{ $item->id }}</td>
                                        <td class="hinh_anh">
                                            @if (!empty($item->hinh_anh))
                                            <img src="{{ \Storage::url($item->hinh_anh) }}" width="64px" alt="Hình ảnh danh mục">
                                            @else
                                            <img src="{{ asset('he_thongs/avatar_default.jpeg') }}" width="150px" alt="Hình ảnh danh mục">

                                            @endif
                                        </td>

                                        <td class="email">{{ $item->danhMuc->ten_danh_muc }}</td>
                                        <td class="email">{{ $item->ten_san_pham }}</td>
                                        <td class="trang_thai">
                                            @if ($item->trang_thai == 0)
                                            <span class="badge bg-success">Hêt hàng</span>
                                            @elseif($item->trang_thai == 1)
                                            <span class="badge bg-danger">Chờ hàng</span>
                                            @elseif($item->trang_thai == 2)
                                            <span class="badge bg-danger">Hàng tồn kho thấp</span>
                                            @else
                                            <span class="badge bg-danger">Còn hàng</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->so_luong_ton }}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!-- end tab pane -->


                    <div class="tab-pane" id="" role="tabpanel">
                        <div id="table-product-list-published" class="table-card gridjs-border-none">

                            <div class="card">
                                <table class="table align-middle" id="example">
                                    <thead class="table-primary text-muted">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Hình ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Tên</th>
                                            <th>Trạng thái</th>
                                            <th>Tồn kho</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="table-primary text-muted">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Hình ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Tên</th>
                                            <th>Trạng thái</th>
                                            <th>Tồn kho</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="list form-check-all">
                                        @foreach($data as $item)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $item->id }}">
                                                </div>
                                            </th>
                                            <td class="id">{{ $item->id }}</td>
                                            <td class="hinh_anh">
                                                @if (!empty($item->hinh_anh))
                                                <img src="{{ \Storage::url($item->hinh_anh) }}" width="64px" alt="Hình ảnh danh mục">
                                                @else
                                                <img src="{{ asset('he_thongs/avatar_default.jpeg') }}" width="150px" alt="Hình ảnh danh mục">

                                                @endif
                                            </td>

                                            <td class="email">{{ $item->danhMuc->ten_danh_muc }}</td>
                                            <td class="email">{{ $item->ten_san_pham }}</td>
                                            <td class="trang_thai">
                                                @if ($item->trang_thai == 0)
                                                <span class="badge bg-success">Hêt hàng</span>
                                                @elseif($item->trang_thai == 1)
                                                <span class="badge bg-danger">Chờ hàng</span>
                                                @elseif($item->trang_thai == 2)
                                                <span class="badge bg-danger">Hàng tồn kho thấp</span>
                                                @else
                                                <span class="badge bg-danger">Còn hàng</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->so_luong_ton }}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!-- end tab pane -->
                    <button onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" type="submit" name="deleteSelected" class="btn btn-danger">
                        Xóa nhiều
                    </button>
                    <div class="tab-pane" id="productnav-draft" role="tabpanel">

                        <div class="py-4 text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                            </lord-icon>
                            <h5 class="mt-4">Sorry! No Result Found</h5>
                        </div>
                    </div>
                    <!-- end tab pane -->
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
@section('script-lib')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<script src="assets/js/pages/datatables.init.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#example1');
        new DataTable('#example2');
        new DataTable('#example3');
        new DataTable('#example4');
        new DataTable('#example5');
        new DataTable('#example6');
        new DataTable('#example7');
        new DataTable('#example8');
        new DataTable('#example9');
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
<style>
    .nav-tabs-custom {
        display: flex;
        width: 100%;
    }

    .nav-item {
        flex: 1;
        /* Mỗi tab sẽ chiếm 1/5 chiều rộng */
    }

    .nav-link.kho {
        text-align: center;
        width: 100%;
        padding: 15px 0;
      
    }

    .nav-link i {
        margin-right: 8px;
    }

    .nav-link.active {
        background-color: #007bff;
        color: white;
    }

    .badge {
        margin-left: 5px;
    }
</style>

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection