@extends('admin.layouts.master')
@section('content')



<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Chi tiết đơn hàng</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.don_hangs.index')}}">Danh sách đơn hàng</a></li>

                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-8">
        @if (session('thongbao'))
        <div id="thongbao-alert" class="alert alert-{{ session('thongbao.type') }} alert-dismissible bg-{{ session('thongbao.type') }} text-white alert-label-icon fade show" role="alert">
            <i class="ri-notification-off-line label-icon"></i><strong> {{ session('thongbao.message') }}</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
        @php
        session()->forget('thongbao');
        @endphp
        @endif
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Đơn hàng | <strong>{{$don_hang->ma_don_hang}}</strong></h5>
                    <div class="flex-shrink-0 mx-2">
                        <a 
                            href="{{ route('admin.don_hangs.destroy', $don_hang->id) }}" 
                            onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                            class="btn btn-danger btn-xl">
                            <i class="ri-download-2-fill align-middle me-1"></i>Xóa đơn hàng
                            
                        </a>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.don_hangs.edit', $don_hang->id) }}" class="btn btn-warning btn-xl"><i class="ri-download-2-fill align-middle me-1"></i>Sửa đơn hàng</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap align-middle table-borderless mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th class="text-end" scope="col">Giá sản phẩm</th>
                                <th class="text-center" scope="col">Số lượng</th>
                                <th class="text-center" scope="col">Đánh giá</th>
                                <th scope="col" class="text-end">Tổng tiền</th>
                            </tr>

                        </thead>
                        <tbody>
                            @php
                            $tongTien = 0;
                            $giamGia =5/100;
                            $phiGiaoHang = 200000; // Ví dụ phí giao hàng, có thể được thay đổi
                            $thue = 3/100; // Ví dụ thuế, có thể được thay đổi
                            @endphp

                            @foreach($bien_thes as $item)

                            @php
                            $tongTienSanPham = $item->so_luong * $item->sanPhamBienThes->gia;
                            $tongTien += $tongTienSanPham;
                            @endphp
                            <tr style="border-bottom: 1px solid #dad7cd">
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                            <img src="{{\Storage::url($item->sanPhamBienThes->hinh_anh)}}" alt="" class="img-fluid d-block">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="fs-15"><a href="{{ route('admin.san_phams.show', $item->sanPhamBienThes->sanPham->id)}}" class="link-primary">{{$item->sanPhamBienThes->sanPham->ten_san_pham}}</a></h5>
                                            <p style="width:18px;height:18px; background-color:{{$item->sanPhamBienThes->sanPhamColor->ma_mau}};" class="text-muted mb-0"> <span class="fw-medium"></span></p>
                                            <p class="text-muted mb-0">Size: <span class="fw-medium">{{$item->sanPhamBienThes->sanPhamSize->ten_size}}</span></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end">{{ number_format($item->sanPhamBienThes->gia, 0, ',', '.') }} VND
                                </td>
                                <td class="text-center">{{$item->so_luong}}</td>
                                <td class="text-center">
                                    <div class="text-warning fs-15">
                                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i>
                                    </div>
                                </td>
                                <td class="fw-medium text-end">
                                    <strong>{{number_format($item->so_luong*$item->sanPhamBienThes->gia, 0, ',', '.') }}</strong> VND
                                </td>
                            </tr>

                            @endforeach
                            @php
                            $tongThanhToan = $tongTien - $tongTien*$giamGia + $phiGiaoHang + $tongTien*$thue;
                            @endphp
                            <tr class="border-top border-top-dashed">
                                <td colspan="3"></td>
                                <td colspan="2" class="fw-medium p-0">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td><strong>Tổng tiền</strong></td>
                                                <td class="text-end">{{ number_format($tongTien, 0, ',', '.') }} VND</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Giảm giá</strong> <span class="text-muted">(VELZON15)</span> :</td>
                                                <td class="text-end"><span class="btn btn-danger btn-sm mt-2 mt-sm-0">5%</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Thuế giá trị</strong></td>
                                                <td class="text-end"><span class="btn btn-info btn-sm mt-2 mt-sm-0">3%</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phí giao hàng</strong></td>
                                                <td class="text-end">{{ number_format($phiGiaoHang, 0, ',', '.') }} VND</td>
                                            </tr>
                                            <tr class="border-top border-top-dashed">
                                                <th scope="row"><strong>Tổng thanh toán (VND)</strong></th>
                                                <th class="text-end">{{ number_format($tongThanhToan, 0, ',', '.') }} VND</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Trạng thái đơn hàng</h5>
                    <div class="flex-shrink-0 mt-2 mt-sm-0">
                        <a id="updateStatus"
                            data-don-hang-id="{{$don_hang->id}}"
                            data-van-chuyen-id="{{$don_hang->van_chuyen_id}}"
                            data-trang-thai="{{$don_hang->trang_thai_don_hang_id}}"
                            href="javascript:void(0);"
                            class="btn btn-soft-info btn-sm mt-2 mt-sm-0">
                            <i class="ri-share-box-line fs-16 align-middle me-1"></i>
                            Chuyển trạng thái
                        </a>

                        @if($don_hang->trang_thai_don_hang_id > 3)
                        <button

                            id="huy-don"
                            type="button"
                            class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"
                            onclick="alert('Không thể hủy đơn này vì trạng thái đơn hàng đã vượt quá giới hạn cho phép.')"
                            {{$don_hang->trang_thai_don_hang_id ==7 ?'disable' : ''}}>
                            <i class="mdi mdi-archive-remove-outline fs-16 align-middle me-1"></i>Hủy đơn
                        </button>
                        @else
                        <button
                            data-don-hang-id="{{$don_hang->id}}"
                            data-van-chuyen-id="{{$don_hang->van_chuyen_id}}"
                            data-trang-thai="{{$don_hang->trang_thai_don_hang_id}}"
                            id="huy_don_{{$don_hang->trang_thai_id}}"
                            type="button"
                            class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"
                            data-bs-toggle="modal"
                            data-bs-target="#showModal">
                            <i class="mdi mdi-archive-remove-outline fs-16 align-middle me-1"></i>Hủy đơn
                        </button>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header  bg-danger p-3">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Lí do hủy đơn</h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form class="tablelist-form" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="table-wrapper" style="max-height: 500px; overflow-y: auto;">
                                                <textarea style="height:120px" class="form-control" name="ghi_chu" id="ghi_chu"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a
                                                data-don-hang-id="{{$don_hang->id}}"
                                                data-van-chuyen-id="{{$don_hang->van_chuyen_id}}"
                                                data-trang-thai="{{$don_hang->trang_thai_don_hang_id}}"
                                                href="javascript:void(0);"
                                                id="cancel-order"
                                                class="btn btn-danger">Submit
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="profile-timeline">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @php
                        $currentIndex = 1; // Bắt đầu từ 1
                        $icon = ['ri-add-circle-fill', 'ri-login-circle-fill', 'bx bx-package', 'ri-truck-line', 'bx bxs-check-shield', 'ri-checkbox-circle-fill', 'ri-close-circle-fill'];
                        $dem=0
                        @endphp

                        @foreach($ttdh as $item)
                        @if(in_array($currentIndex, $mang_tt))

                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="heading{{$item->ma_trang_thai}}">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse{{$item->ma_trang_thai}}" aria-expanded="true" aria-controls="collapse{{$item->ma_trang_thai}}">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title {{ $currentIndex == 7 ? 'bg-danger' : 'bg-success' }} rounded-circle">
                                                <i class="{{ $icon[$currentIndex-1] }} fs-16"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-15 mb-0 fw-semibold">{{ $item->ten_trang_thai }}<span class="fw-normal"> | {{ $ttdh_count[$dem]->updated_at->format('D, d M Y') }} |</span></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse{{$item->ma_trang_thai}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$item->ma_trang_thai}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body ms-2 ps-5 pt-0">
                                    <h6 class="mb">{{ $item->mo_ta }}</h6>
                                    <p class="text-black">{{ \Carbon\Carbon::parse($ttdh_count[$dem]->updated_at)->format('D, d M Y - h:iA') }}</p>
                                    @if($ttdh_count[$dem]->tai_khoan_id )
                                    <p class="text-black">Lý do hủy đơn | {{ $ttdh_count[$dem]->ghi_chu}} </p>
                                    <p class="text-black">
                                        <strong> Nhân viên xác nhận | ID {{ $ttdh_count[$dem]->id }} |{{ $ttdh_count[$dem]->taiKhoan->ten_tai_khoan }}</strong>
                                    </p>
    
                                    @endif
                                </div>
                            </div>
                        </div>
                        @php
                        $dem++
                        @endphp
                        @else
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingFive">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFile" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div style="background-color: #d8e2dc;" class="avatar-title text-muted rounded-circle">
                                                <i class="{{ $icon[$currentIndex-1] }} fs-16"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-0 fw-light text-muted">{{ $item->ten_trang_thai }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif

                        @php
                        $currentIndex++; // Tăng giá trị của chỉ số
                        @endphp
                        @endforeach
                    </div>

                    <!--end accordion-->
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0"><i class="mdi mdi-truck-fast-outline align-middle me-1 text-muted fs-24"></i><strong>Bên vân chuyển</strong></h5>

                </div>
            </div>
            <div class="card-body">
                <div class="card-body">

                    <div class="text-center">
                        <div class="d-flex mb-4">
                            <select style="border-radius: 0; outline: none; box-shadow: 0 0 0 1px rgba(74, 144, 226, 0.3);box-sizing: border-box;" class="form-select" id="van_chuyen_id" name="van_chuyen_id" data-choices="" data-choices-search-false="">
                                <option value="">-- Chọn bên vận chuyển --</option>
                                @foreach($van_chuyens as $id => $ten_van_chuyen)
                                <option value="{{ $id }}">{{ $ten_van_chuyen }}</option>
                                @endforeach
                            </select>
                            <div id="status-container" data-trang-thai="{{ $tt_hien_tai }}"></div>

                            <a data-don-hang-id="{{$don_hang->id}}" id="add-vanchuyen" style="border-radius:0;" href="javascript:void(0);" class="btn btn-success">Submit</a>
                        </div>
                        <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:100px;height:100px"></lord-icon>

                        <h5 class="fs-16 mt-2">{{ $don_hang->vanChuyen->ten_van_chuyen ?? 'N/A' }}</h5>

                        <p class="text-muted mb-0">SĐT {{ $don_hang->vanChuyen->so_dien_thoai ?? 'N/A' }}</p>

                        <p class="text-muted mb-0">Địa chỉ : {{ $don_hang->vanChuyen->dia_chi ?? 'N/A' }}</p>

                    </div>

                </div>

            </div>
        </div>
        <!--end card-->

        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0 d-flex align-items-center">
                        <i class="ri-account-box-fill me-1 text-muted fs-20"></i><strong>Thông tin khách hàng</strong>
                    </h5>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.tai_khoans.show', $tai_khoan->id) }}" class="badge badge-gradient-warning fs-14">View Profile</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 vstack gap-3">
                    <li>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{\Storage::url($tai_khoan->hinh_anh)}}" alt="" class="avatar-sm rounded">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">{{$tai_khoan->ten_tai_khoan}}</h6>
                                <p class="text-muted mb-0">Khách hàng</p>
                            </div>
                        </div>
                    </li>
                    <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{$tai_khoan->email}}</li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{$tai_khoan->so_dien_thoai}}</li>
                </ul>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-earth-fill fs-20 align-middle me-1 text-muted"></i>Địa chỉ khách hàng</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14"><strong>{{$tai_khoan->ten_tai_khoan}}</strong></li>
                    <li>{{$tai_khoan->so_dien_thoai}}</li>
                    <li>{{$tai_khoan->email}}</li>
                    <li>{{$tai_khoan->dia_chi}}</li>

                </ul>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-earth-fill fs-20 align-middle me-1 text-muted"></i> Địa chỉ giao hàng</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14"><strong>{{$don_hang->ten_nguoi_nhan}}</strong></li>
                    <li>{{$don_hang->sdt_nguoi_nhan}}</li>
                    <li>{{$don_hang->email_nguoi_nhan}}</li>
                    <li>{{$don_hang->dia_chi_nguoi_nhan}}</li>
                </ul>
            </div>
        </div>
        <!--end card-->

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-wallet-3-fill fs-20 align-bottom me-1 text-muted"></i>Thông tin thanh toán</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Transactions:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">#VLZ124561278124</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Payment Method:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">Debit Card</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Card Holder Name:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">Joseph Parker</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Card Number:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">xxxx xxxx xxxx 2456</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Total Amount:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">$415.96</h6>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->


<!-- container-fluid -->


@endsection
@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#updateStatus').on('click', function() {
            var dh_id = $(this).data('don-hang-id');
            var tt_id = $(this).data('trang-thai');
            var vc_id = $(this).data('van-chuyen-id');

            if (tt_id == 3 && !vc_id) {
                alert('Bạn không thể chuyển trạng thái nếu chưa chọn bên vận chuyển');
                return false;
            }
            if (tt_id > 6) {
                return false;
            }
            if (confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này không?')) {
                $.ajax({
                    url: '{{ url("admin/don_hangs/update-status") }}',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        don_hang_id: dh_id,
                        trang_thai_id: tt_id,
                    },
                    success: function(response) {
                        // Kiểm tra phản hồi từ server
                        if (response.success) {
                            alert(response.success);
                        } else {
                            alert('Có lỗi xảy ra: ' + response.message);
                        }
                        location.reload(); // Tải lại trang sau khi cập nhật
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra. Vui lòng thử lại');
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#cancel-order').on('click', function() {
            var dh_id = $(this).data('don-hang-id');
            var tt_id = $(this).data('trang-thai');
            var vc_id = $(this).data('van-chuyen-id');
            var ghiChu = $('#ghi_chu').val();

            if (tt_id > 3) {
                alert('Bạn không thể hủy đơn do đơn đã được giao cho bên vận chuyển');
                return false;
            }


            $.ajax({
                url: '{{ url("admin/don_hangs/cancel") }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    don_hang_id: dh_id,
                    ghi_chu: ghiChu
                },
                success: function(response) {
                    // Kiểm tra phản hồi từ server
                    if (response.success) {
                        alert(response.success);
                    } else {
                        alert('Có lỗi xảy ra: ' + response.message);
                    }
                    location.reload(); // Tải lại trang sau khi cập nhật
                },
                error: function(xhr, status, error) {
                    alert('Có lỗi xảy ra. Vui lòng thử lại');
                }
            });

        });
    });
    $(document).ready(function() {
        $('#huy-don').on('click', function() {

            var tt_id = $(this).data('trang-thai');

            if (3 < tt_id) {
                alert('Bạn không thể hủy đơn do đơn đã được giao cho bên vận chuyển');
                return false;
            }
            if (tt_id = 7) {
                return false;
            }


        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#add-vanchuyen').on('click', function() {
            var vc_id = $('#van_chuyen_id').val();
            var dh_id = $(this).data('don-hang-id');
            var trangThai = document.getElementById('status-container').getAttribute('data-trang-thai');
            if (trangThai > 3) {
                alert('Bạn không thể thay đổi bên vận chuyển');
                return false;
            }
            $.ajax({
                url: '{{url("admin/don_hangs/add-vanchuyen")}}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    van_chuyen_id: vc_id,
                    don_hang_id: dh_id
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.success)

                    } else {
                        alert('Có lỗi xảy ra.')
                    }
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Có lỗi xảy ra. Vui lòng thử lại')
                }
            })
        })
    })
</script>
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


@endsection

@section('style')
<style>
    .profile-photo-edit {
        position: absolute;
        bottom: 0;
        right: 0;
        cursor: pointer;
        background-color: #fff;
        /* Nền màu trắng */
        border-radius: 50%;
        /* Để phần tử thành hình tròn */
        border: 0.8px solid gray;
        /* Đường viền trắng */
        padding: 4px;
        /* Khoảng cách xung quanh icon */
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        /* Đặt kích thước của phần tử */
        height: 40px;
        /* Đặt kích thước của phần tử */
    }

    .profile-photo-edit .avatar-title {
        font-size: 24px;
        /* Kích thước của icon */
        line-height: 1;
        color: #000;
        /* Màu của icon, có thể thay đổi tùy theo ý thích */
    }

    .d-none {
        display: none;
    }
</style>
@endsection