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
    <div class="card">
        @if (session('thongbao'))
        <div id="thongbao-alert" class="alert alert-{{ session('thongbao.type') }} alert-dismissible bg-{{ session('thongbao.type') }} text-white alert-label-icon fade show" role="alert">
            <i class="ri-notification-off-line label-icon"></i><strong> {{ session('thongbao.message') }}</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
        @php
        session()->forget('thongbao');
        @endphp
        @endif
        <div class="card-header">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Danh sách sản phẩm</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <a href="{{ route('admin.san_phams.create')}}" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm sản phẩm</a>
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
                                All <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">12</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab" aria-selected="false" tabindex="-1">
                                Published <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">5</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab" aria-selected="false" tabindex="-1">
                                Draft
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
        <form id="deleteForm" action="{{ route('admin.san_phams.delete-selected') }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane active show" id="productnav-all" role="tabpanel">

                        <div id="table-product-list-all" class="table-card gridjs-border-none">
                            <table id="example1" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                        <i class="bx bx-grid-vertical"></i>
                                    </th> -->
                                        <th>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 34.6066px;" aria-label="ID: activate to sort column ascending">Sản phẩm</th>
                                        <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 83.6066px;" aria-label="Purchase ID: activate to sort column ascending">Giá gốc</th>
                                        <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 246.607px;" aria-label="Title: activate to sort column ascending">Số lượng tồn</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Assigned To: activate to sort column ascending">Xếp hạng TB</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Created By: activate to sort column ascending">Trạng thái</th>

                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Status: activate to sort column ascending">Lượt xem</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="User: activate to sort column ascending">Action</th>
                                        <!-- <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Priority: activate to sort column ascending">Giá khuyến mãi</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Priority: activate to sort column ascending">Thương hiệu</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Priority: activate to sort column ascending">Mô tả</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Priority: activate to sort column ascending">Nội dung</th> -->

                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach($san_phams as $index => $item)
                                    <tr class="odd">
                                        <!-- <th scope="row" class="dtr-control sorting_1" tabindex="0">

                                    </th> -->
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $item->id }}">
                                            </div>
                                        </td>

                                        <td data-column-id="product">
                                            <span>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded p-1"><img src="{{ \Storage::url($item->hinh_anh) }}" alt="" class="img-fluid d-block"></div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-body">{{$item->ten_san_pham}}</a></h5>
                                                        <p class="text-muted mb-0"><strong>Category : </strong><span class="fw-medium">{{$item->danhMuc->ten_danh_muc}}</span><strong> - ID: </strong><span class="fw-medium">{{$item->id}}</span></p>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>

                                        <td>{{ number_format($item->gia, 0, ',', '.') }} VND</td>
                                        <td>{{$item->so_luong_ton}}</td>
                                        <td>
                                            @if ($item->trang_thai == 1)
                                            <span class="badge bg-success">Hoạt động</span>
                                            @else
                                            <span class="badge bg-danger">Tạm dừng</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span>
                                                <span class="badge bg-light text-body fs-12 fw-medium">
                                                    <i class="mdi mdi-star text-warning me-1"></i>{{$item->xep_hang_tb}}
                                                </span>
                                            </span>
                                        </td>
                                        <td style="display: none;">{{$item->luot_xem}}</td>
                                        <td style="display: none;">
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <!-- Edit Button -->
                                                <li class="list-inline-item edit" title="Edit">
                                                    <a href="{{ route('admin.san_phams.edit', $item->id)}}" class="text-primary d-inline-block edit-item-btn">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <!-- Remove Button -->
                                                <li class="list-inline-item" title="Remove">
                                                    <a onclick="return confirm('Bạn đã chắc chắn chưa?')" href="{{ route('admin.san_phams.destroy', $item->id) }}">
                                                        <i style="color:red;" class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.san_phams.show', $item->id)}}" class="text-primary d-inline-block edit-item-btn">
                                                        <i style="color:green;width: 120%" class="ri-profile-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                        <!-- <td style="display: none;">{{ number_format($item->gia_khuyen_mai, 0, ',', '.') }} VND</span></td>
                                    <td style="display: none;">{{$item->thuong_hieu}}</td>
                                    <td style="display: none;">{{$item->mo_ta_ngan}}</td>
                                    <td style="display: none;">{{$item->mo_ta}}</td> -->

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!-- end tab pane -->

                    <div class="tab-pane" id="productnav-published" role="tabpanel">
                        <div id="table-product-list-published" class="table-card gridjs-border-none">

                            <table id="example2" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                <thead>
                                    <tr>

                                        <th>
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 34.6066px;" aria-label="ID: activate to sort column ascending">Sản phẩm</th>
                                        <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 83.6066px;" aria-label="Purchase ID: activate to sort column ascending">Giá gốc</th>
                                        <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 246.607px;" aria-label="Title: activate to sort column ascending">Số lượng tồn</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Assigned To: activate to sort column ascending">Xếp hạng TB</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Created By: activate to sort column ascending">Trạng thái</th>

                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Status: activate to sort column ascending">Lượt xem</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="User: activate to sort column ascending">Action</th>


                                </thead>
                                <tbody>
                                    @foreach($san_phams as $index => $item)
                                    <tr class="odd">

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </td>

                                        <td data-column-id="product">
                                            <span>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded p-1"><img src="{{ \Storage::url($item->hinh_anh) }}" alt="" class="img-fluid d-block"></div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-body">{{$item->ten_san_pham}}</a></h5>
                                                        <p class="text-muted mb-0"><strong>Category : </strong><span class="fw-medium">{{$item->danhMuc->ten_danh_muc}}</span><strong> - ID: </strong><span class="fw-medium">{{$item->id}}</span></p>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>

                                        <td>{{ number_format($item->gia, 0, ',', '.') }} VND</td>
                                        <td>{{$item->so_luong_ton}}</td>
                                        <td>
                                            @if ($item->trang_thai == 1)
                                            <span class="badge bg-success">Hoạt động</span>
                                            @else
                                            <span class="badge bg-danger">Tạm dừng</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span>
                                                <span class="badge bg-light text-body fs-12 fw-medium">
                                                    <i class="mdi mdi-star text-warning me-1"></i>{{$item->xep_hang_tb}}
                                                </span>
                                            </span>
                                        </td>
                                        <td style="display: none;">{{$item->luot_xem}}</td>
                                        <td style="display: none;">
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <!-- Edit Button -->
                                                <li class="list-inline-item edit" title="Edit">
                                                    <a href="{{ route('admin.san_phams.edit', $item->id)}}" class="text-primary d-inline-block edit-item-btn">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <!-- Remove Button -->
                                                <li class="list-inline-item" title="Remove">
                                                    <a onclick="return confirm('Bạn đã chắc chắn chưa?')" href="{{ route('admin.san_phams.destroy', $item->id) }}">
                                                        <i style="color:red;" class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.san_phams.show', $item->id)}}" class="text-primary d-inline-block edit-item-btn">
                                                        <i style="color:green;width: 120%" class="ri-profile-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection