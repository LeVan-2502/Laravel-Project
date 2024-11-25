@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Khuyến mãi</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.khuyen_mais.index')}}">Danh sách khuyến mãi</a></li>
            <li class="breadcrumb-item active">Khuyến mãi</li>
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
                        <h5 class="card-title mb-0">Danh sách khuyến mãi</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <a href="{{ route('admin.khuyen_mais.create')}}" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm chương trình khuyến mãi</a>
                    </div>
                </div>
            </div>
        </div>
        <form id="deleteForm" action="{{ route('admin.khuyen_mais.delete-selected') }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="card-body">
                <div id="table-product-list-published" class="table-card gridjs-border-none">

                    <table id="example2" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 34.6066px;" aria-label="ID: activate to sort column ascending">Hành động</th>
                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 34.6066px;" aria-label="ID: activate to sort column ascending">Tên khuyến mãi</th>
                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 83.6066px;" aria-label="Purchase ID: activate to sort column ascending">Mô tả</th>
                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 83.6066px;" aria-label="Purchase ID: activate to sort column ascending">Giá trị</th>
                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 83.6066px;" aria-label="Purchase ID: activate to sort column ascending">Điều kiện</th>
                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 83.6066px;" aria-label="Purchase ID: activate to sort column ascending">Ngày bắt đầu</th>
                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 83.6066px;" aria-label="Title: activate to sort column ascending">Ngày kết thúc</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Status: activate to sort column ascending">Trạng thái</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khuyen_mais as $index => $item)
                            <tr class="odd">

                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                    </div>
                                </td>
                                <td style="display: none;">
                                    <ul class="list-inline hstack mb-0">
                                        <!-- Edit Button -->
                                        <li class="list-inline-item edit" title="Chi tiết">
                                            <a
                                                href="{{ route('admin.khuyen_mais.show', $item->id)}}"
                                                class="btn btn-info btn-icon waves-effect waves-light btn-sm">
                                                <i class="  ri-menu-add-line fs-16"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item edit" title="Sửa">
                                            <a
                                                href="{{ route('admin.khuyen_mais.edit', $item->id)}}"
                                                class="btn btn-warning btn-icon waves-effect waves-light btn-sm">
                                                <i class="ri-pencil-fill fs-16"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item edit" title="Xóa">
                                            <a
                                                onclick="return confirm('Khi bạn xác nhận mọi thông tin dữ liệu liên quan đều bị xóa')"
                                                href="{{ route('admin.khuyen_mais.destroy', $item->id)}}"
                                                class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                                                <i class="ri-delete-bin-7-line fs-16"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>{{$item->ten_khuyen_mai}}</td>
                                <td>{{$item->mo_ta}}</td>
                                <td>

                                    @if((int) $item->gia_tri_khuyen_mai === 0)
                                    <!-- Hiển thị rỗng nếu giá trị bằng 0 -->
                                    @else
                                    <button class="btn btn-danger btn-sm">{{ (int) $item->gia_tri_khuyen_mai }}%</button>
                                    @endif

                                </td>


                                <td>
                                    @php
                                    // Giải mã chuỗi JSON thành đối tượng
                                    $decodedDieuKien = json_decode($item->dieu_kien_ap_dung);
                                    @endphp

                                    @if(is_object($decodedDieuKien))
                                    @foreach($decodedDieuKien as $key => $dk)
                                    <strong>{{ $key ?? '' }}</strong> {{ $dk ?? '' }}<br>
                                    @endforeach
                                    @else
                                    Không có điều kiện
                                    @endif
                                </td>



                                <td>{{$item->ngay_bat_dau}}</td>
                                <td>{{$item->ngay_ket_thuc}}</td>

                                <td>
                                    @if ($item->trang_thai == 1)
                                    <span class="badge bg-success">Hoạt động</span>
                                    @else
                                    <span class="badge bg-danger">Tạm dừng</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<style>
    /* Sử dụng các lớp utility để điều chỉnh kích thước và padding */
    /* Thanh tìm kiếm */
    /* Thanh tìm kiếm */
    .dataTables_filter input {
        width: 250px;
        padding: 5px;
        border-radius: 3px;
    }

    /* Ô hiển thị số lượng mục */
    .dataTables_length select {
        width: 120px;
        padding: ;
        border-radius: 1px;
    }

    /* Đặt khoảng cách giữa các phần tử */
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_length {
        margin-bottom: 10px;
    }
</style>

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection