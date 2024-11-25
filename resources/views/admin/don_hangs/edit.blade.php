@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Đơn hàng</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{route('admin.don_hangs.index')}}">List dơn hàng</a></li>
            <li class="breadcrumb-item active">Sửa đơn hàng</li>
        </ol>
    </div>

</div>
<div class="row mb-3">
    <div class="col-xl-8">
        @if (session('thongbao'))
        <div id="thongbao-alert" class="alert alert-{{ session('thongbao.type') }} alert-dismissible bg-{{ session('thongbao.type') }} text-white alert-label-icon fade show" role="alert">
            @if(session('thongbao.type')=='success')
            <i style="font-size: 24px;" class="ri-checkbox-circle-fill label-icon"></i>
            @else
            <i style="font-size: 24px;"  class="ri-close-circle-fill label-icon"></i>
            @endif
            <strong> {{ session('thongbao.message') }}</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
        @php
        session()->forget('thongbao');
        @endphp
        @endif
        <form action="{{ route('admin.don_hangs.update-bienthe')}}" method="POST">
            @csrf
            <input type="hidden" name="page" value="edit">
            <input type="hidden" name="don_hang_id" value="{{$don_hang->id}}">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <div>
                                <h5 class="fs-14 mb-0"><strong>SẢN PHẨM TRONG ĐƠN HÀNG</strong></h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <!-- Nút mở modal -->
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                                <i class="ri-add-line align-bottom me-1"></i> Thêm sản phẩm
                            </button>

                            <!-- Modal -->
                            <div class="modal xl" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div style="border-bottom: 1px solid gray" class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-header bg-light p-3">

                                            <ul id="product-list" class="d-flex flex-wrap">
                                            </ul>

                                        </div>
                                        <form class="tablelist-form" autocomplete="off">
                                            <div class="modal-body">
                                                <div class="table-wrapper" style="max-height: 500px; overflow-y: auto;">
                                                    <table id="example1" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%; color:black">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>SKU</th>
                                                                <th>Tên sản phẩm</th>
                                                                <th>Color</th>
                                                                <th>Size</th>
                                                                <th>Thêm</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($san_pham_bien_thes as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td>{{ $item->sku }}</td>
                                                                <td>{{ $item->sanPham->ten_san_pham }}</td>
                                                                <td>{{ $item->sanPhamSize->ten_size }}</td>
                                                                <td>
                                                                    <div style="width: 24px; height: 24px; background-color: {{ $item->sanPhamColor->ma_mau }};"></div>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn add-product-btn" data-id="{{$item->id}}">
                                                                        <i class="ri-add-circle-fill fs-24 text-success"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="javascript:void(0);" id="btn-submit" type="a" class="btn btn-success">Submit</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card-body bg-light">
                    @php
                    $tong_thanh_toan=0;
                    @endphp
                    @if (session('order') && !empty(session('order')))
                    @foreach(session('order') as $item)
                    @php
                    $so_luong = $item['so_luong'];
                    $gia = $item['gia'];
                    $tong_tien = $so_luong * $gia;
                    $tong_thanh_toan+=$tong_tien
                    @endphp
                    <div class="card product">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-sm-auto">
                                    <div class="avatar-lg bg-light rounded p-1">
                                        <!-- Sử dụng đường dẫn động cho hình ảnh sản phẩm -->
                                        <img src="{{ \Storage::url($item['hinh_anh']) }}" alt="{{ $item['ten_san_pham'] }}" class="img-fluid d-block">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <h5 class="fs-14 text-truncate">
                                        <a href="#" class="text-body"><strong>{{ $item['ten_san_pham'] ?? 'N/A' }}</strong></a>
                                    </h5>
                                    <h5 class="fs-14 text-truncate">
                                        <a href="#" class="text-body">SKU <strong>{{ $item['sku'] ?? 'N/A' }} | {{ $item['ten_danh_muc'] ?? 'N/A' }}</strong></a>
                                    </h5>

                                    <div>
                                        <div class="d-flex">
                                            <input type="hidden" name="bien_the_id[{{$item['id']}}]" value="{{$item['id']}}">
                                            <div class="input-step">
                                                <button type="button" class="minus">–</button>
                                                <input name="so_luong[{{$item['id']}}]" type="number" class="product-quantity" value="{{ $item['so_luong'] ?? '1' }}" min="0" max="100">
                                                <button type="button" class="plus">+</button>
                                            </div>
                                            <div class="mx-2">
                                                <button style="border: 1px solid gray" class="btn btn-muted">{{ $item['size'] }}</button>
                                            </div>
                                            <div>
                                                <div style="border-radius: 2px;width: 38px; height: 38px; background-color: {{ $item['color'] }};"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div></div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="text-lg-end">
                                        <p class="text-muted mb-1">Giá sản phẩm</p>
                                        <h5 class="fs-14"><span class="product-price">{{ number_format($item['gia'] ?? 0, 0, ',', '.') }}
                                                VND</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->

                        <div class="card-footer">
                            <div class="row align-items-center gy-3">
                                <div class="col-sm">
                                    <div class="d-flex flex-wrap my-n1">
                                        <div>
                                            <button type="button" class="btn-delete btn btn-danger" data-san-pham-id="{{ $item['id'] }}">
                                                <i class="ri-delete-bin-fill text-white align-bottom me-1"></i>Xóa
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <div>Tổng Tiền</div>
                                        <h5 class="fs-14 mb-0">{{ number_format($tong_tien ?? 0, 0, ',', '.') }}
                                            VND</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card footer -->
                    </div>
                    @endforeach
                    @else


                    <div class="card product">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-sm-auto">
                                    <div class="avatar-lg bg-light rounded p-1">
                                        <!-- Sử dụng đường dẫn động cho hình ảnh sản phẩm -->
                                        <img src="" alt="" class="img-fluid d-block">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <h5 class="fs-14 text-truncate">
                                        <a href="#" class="text-body"></a>
                                    </h5>
                                    <ul class="list-inline text-muted">
                                        <li class="list-inline-item">Color: <span class="fw-medium"></span></li>
                                        <li class="list-inline-item">Size: <span class="fw-medium"></span></li>
                                    </ul>

                                    <div class="input-step">
                                        <button type="button" class="minus">–</button>
                                        <input type="number" class="product-quantity" value="1" min="0" max="100">
                                        <button type="button" class="plus">+</button>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="text-lg-end">
                                        <p class="text-muted mb-1">Item Price:</p>
                                        <h5 class="fs-14">$<span class="product-price"></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-footer">
                            <div class="row align-items-center gy-3">
                                <div class="col-sm">
                                    <div class="d-flex flex-wrap my-n1">
                                        <div>
                                            <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                <i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Xóa
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <div>Total:</div>
                                        <h5 class="fs-14 mb-0">$<span class="product-line-price"></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card footer -->
                    </div>
                    @endif

                </div>
                <div class="card-footer d-flex justify-content-between align-center">
                    <button type="submit" class="btn btn-info">
                        Cập nhật sản phẩm
                    </button>
                    <div class="text-end">
                        <p class="text-muted mb-1 ">Tổng thanh toán</p>
                        <h5 class="fs-14"><span class="product-price"><strong>{{ number_format($tong_thanh_toan ?? 0, 0, ',', '.') }}</strong>
                                VND</span></h5>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="sticky-side-div">
            <form method="POST" action="{{route('admin.don_hangs.update', $don_hang->id)}}">
            <input value="{{ $don_hang->id }}" name="id" type="hidden">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">THÔNG TIN ĐỊA CHỈ KHÁCH HÀNG</h5>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                            <!-- Input with Icon -->
                            <input type="hidden" name="thanh_toan" value="{{$tong_thanh_toan}}">
                            <div class="mb-3 form-icon col-12">
                                <label for="iconInput" class="form-label">Mã đơn hàng</label>
                                <div class="form-icon">
                                    <input value="{{ $don_hang->ma_don_hang }}" name="ma_don_hang" type="text" class="form-control form-control-icon" id="iconInput" readonly>
                                    <i class="ri-contacts-line"></i>
                                </div>
                                @error('ma_don_hang')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-icon col-12">
                                <label for="iconInput" class="form-label">Tên người nhận</label>
                                <div class="form-icon">
                                    <input value="{{ $don_hang->ten_nguoi_nhan }}" name="ten_nguoi_nhan" type="text" class="form-control form-control-icon" id="iconInput" placeholder="Ex: Nguyen Van A ....">
                                    <i class="ri-contacts-line"></i>
                                </div>
                                @error('ten_nguoi_nhan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-icon col-12">
                                <label for="iconInput" class="form-label">Email</label>
                                <div class="form-icon">
                                    <input value="{{ $don_hang->email_nguoi_nhan }}" name="email_nguoi_nhan" type="email" class="form-control form-control-icon" id="iconInput" placeholder="example@gmail.com">
                                    <i class="ri-mail-unread-line"></i>
                                </div>
                                @error('email_nguoi_nhan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="slug" class="form-label">Sô điện thoại</label>
                                <div class="form-icon">
                                    <input value="{{ $don_hang->sdt_nguoi_nhan }}" name="sdt_nguoi_nhan" type="text" class="form-control form-control-icon" id="iconInput" placeholder="Ex: 0964 032 101">
                                    <i class="ri-phone-line"></i>
                                </div>

                                @error('sdt_nguoi_nhan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12">
                                <label for="phuong_thuc_id" class="form-label">Phương thức thanh toán</label>
                                <select class="form-select" id="phuong_thuc_id" name="phuong_thuc_id" data-choices="" data-choices-search-false="">
                                    <option value="">-- Chọn phương thức --</option>
                                    @foreach($pttts as $id => $ten_phuong_thuc)
                                    <option value="{{ $id }}" {{$don_hang->phuong_thuc_id == $id ? 'selected' : '' }}>{{ $ten_phuong_thuc }}</option>
                                    @endforeach
                                </select>
                                @error('phuong_thuc_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="slug" class="form-label">Địa chỉ</label>
                                <div class="form-icon">
                                    <input value="{{ $don_hang->dia_chi_nguoi_than }}" name="dia_chi_nguoi_nhan" type="text" class="form-control form-control-icon" id="iconInput" placeholder="Ex: Số 2 Ngách 37 Thổ quan Đống Đa Hà Nội">
                                    <i class=" ri-earth-fill"></i>
                                </div>
                                @error('dia_chi_nguoi_nhan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Ghi chú</label>
                                <textarea class=form-control name="ghi_chu">{{ $don_hang->ghi_chu }}</textarea>
                                @error('ghi_chu')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger">Cập nhật đơn hàng</button>
                    </div>
                </div>
            </form>

        </div>

        <!-- <div class="alert border-dashed alert-danger" role="alert">
            <div class="d-flex align-items-center">
                <lord-icon src="https://cdn.lordicon.com/nkmsrxys.json" trigger="loop" colors="primary:#121331,secondary:#f06548" style="width:80px;height:80px"></lord-icon>
                <div class="ms-2">
                    <h5 class="fs-14 text-danger fw-semibold"> Buying for a loved one?</h5>
                    <p class="text-body mb-1">Gift wrap and personalized message on card, <br>Only for <span class="fw-semibold">$9.99</span> USD </p>
                    <button type="button" class="btn ps-0 btn-sm btn-link text-danger text-uppercase">Add Gift Wrap</button>
                </div>
            </div>
        </div> -->
    </div>
    <!-- end stickey -->

</div>
</div>

</div>
@endsection
@section('script-lib')
<script src="//cdn.ckeditor.com/4.22.0/basic/ckeditor.js"></script>



<!-- dropzone js -->
<script src="{{ asset('theme/velzon/assets/js/pages/form-input-spin.init.js')}}"></script>

<!-- ecommerce cart js -->
<!-- JS của DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#example1')) {
            $('#example1').DataTable().clear().destroy();
        }
        // Khởi tạo DataTable mới
        $('#example1').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorSelects = document.querySelectorAll('.color-select');

        // Hàm cập nhật màu nền cho dropdown
        function updateBackgroundColor(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const selectedColor = selectedOption.getAttribute('data-color');

            if (selectedColor) {
                selectElement.style.backgroundColor = selectedColor;
            } else {
                selectElement.style.backgroundColor = ''; // Reset lại màu nền nếu không chọn
            }
        }

        // Cập nhật màu khi trang được tải lần đầu và khi người dùng thay đổi tùy chọn
        colorSelects.forEach(select => {
            updateBackgroundColor(select);
            select.addEventListener('change', function() {
                updateBackgroundColor(select);
            });
        });
    });
</script>


<script>
    // script.js
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const fileList = document.getElementById('fileList');
        fileList.innerHTML = ''; // Xóa nội dung cũ

        const files = event.target.files;
        for (const file of files) {
            const li = document.createElement('li');
            li.textContent = file.name;
            fileList.appendChild(li);
        }
    });

    // Đăng ký plugin Image Preview
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productList = document.getElementById('product-list');

        // Hàm để lưu các ID vào session storage
        function saveIdsToSession(ids) {
            sessionStorage.setItem('productIds', JSON.stringify(ids));
        }

        // Hàm để lấy các ID từ session storage
        function getIdsFromSession() {
            const ids = sessionStorage.getItem('productIds');
            return ids ? JSON.parse(ids) : [];
        }

        // Khôi phục các ID từ session storage khi trang được tải
        const storedIds = getIdsFromSession();
        storedIds.forEach(productId => {
            const li = document.createElement('li');
            li.id = `${productId}`;
            li.className = 'badge bg-primary d-flex align-items-center bg-success p-2 m-1';
            li.innerHTML = `
            IDSP_${productId}
            <button type="button" class="btn-close text-light" aria-label="Close"></button>
        `;
            productList.appendChild(li);

            li.querySelector('.btn-close').addEventListener('click', function() {
                li.remove();
                const updatedIds = getIdsFromSession().filter(id => id !== productId);
                saveIdsToSession(updatedIds);
            });
        });

        // Xử lý sự kiện click cho các nút thêm sản phẩm
        if (productList) {
            document.querySelectorAll('.add-product-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');

                    // Kiểm tra xem ID đã tồn tại trong session storage chưa
                    const currentIds = getIdsFromSession();
                    if (!currentIds.includes(productId)) {
                        const li = document.createElement('li');
                        li.id = `${productId}`;
                        li.className = 'badge bg-primary d-flex align-items-center bg-success p-2 m-1';
                        li.innerHTML = `
                        IDSP_${productId}
                        <button type="button" class="btn-close text-light" aria-label="Close"></button>
                    `;

                        productList.appendChild(li);

                        // Lưu ID vào session storage
                        currentIds.push(productId);
                        saveIdsToSession(currentIds);

                        li.querySelector('.btn-close').addEventListener('click', function() {
                            li.remove();
                            const updatedIds = getIdsFromSession().filter(id => id !== productId);
                            saveIdsToSession(updatedIds);
                        });
                    }
                });
            });

        }
    });

    // Thực hiện sau khi DOM đã tải xong và các hàm được định nghĩa
    $(document).ready(function() {
        $('#btn-submit').on('click', function() {
            // Đảm bảo rằng hàm getIdsFromSession đã được định nghĩa

            const ids = sessionStorage.getItem('productIds')
            $.ajax({
                url: '{{ url("admin/don_hangs/add-sanpham") }}', // Thay đổi URL đến endpoint của bạn
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    ids_id: ids,
                },
                success: function(response) {
                    if (response.success) {
                        sessionStorage.removeItem('productIds');
                        alert(response.success);

                    } else {
                        alert('Có lỗi xảy ra: ' + response.message);
                    }
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Có lỗi xảy ra. Vui lòng thử lại');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.btn-delete').on('click', function() {
            // Lấy ID sản phẩm từ thuộc tính data
            var sp_id = $(this).data('san-pham-id');

            // Xác nhận trước khi xóa
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                $.ajax({
                    url: '{{ url("admin/don_hangs/delete-sanpham/") }}', // Thay đổi URL đến endpoint của bạn
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: sp_id,
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Tải lại trang để phản ánh thay đổi
                        } else {
                            alert('Có lỗi xảy ra: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra. Vui lòng thử lại');
                    }
                });
            }
        });
    });
</script>



<script src="{{ asset('theme/velzon/assets/js/pages/ecommerce-product-create.init')}}'"></script>


@endsection
@section('script')

<script>
    $(document).ready(function() {
        function formatColorOption(option) {
            if (!option.id) {
                return option.text;
            }
            var color = $(option.element).data('color');
            var $option = $(
                '<span><span style="background-color:' + color + '; width: 14px; height: 14px; display: inline-block; margin-right: 8px; vertical-align: middle;"></span>' + option.text + '</span>'
            );
            return $option;
        };

        $('.color-select').select2({
            templateResult: formatColorOption,
            templateSelection: formatColorOption
        });
    });
</script>

@endsection
@section('style')
<style>
    .color-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: white;
        color: black;
        padding-right: 30px;
        /* Để lại chỗ cho mũi tên */
    }

    .color-select option {
        padding: 5px;
        color: black;
        /* Đảm bảo màu chữ phù hợp */
    }

    .color-select option[data-color] {
        color: #fff;
        /* Màu chữ trên nền màu */
    }


    .table-wrapper {
        position: relative;
    }

    .dataTables_wrapper .dataTables_filter {
        width: 100%;
        position: sticky;
        top: 0;
        background: #fff;
        z-index: 1;
        padding: 10px;

    }

    .dataTables_wrapper .dataTables_wrapper .dataTables_wrapper .dataTables_scrollHead {
        position: sticky;
        top: 40px;
        background: #fff;
        z-index: 1;
    }

    .dataTables_wrapper .dataTables_filter {
        display: flex;
        justify-content: flex-end;
    }

    .dataTables_wrapper .dataTables_length {
        display: none;
    }

    .dataTables_wrapper .dataTables_filter input[type="search"] {
        width: 100% !important;
        padding: 0.5rem;
        box-sizing: border-box;


    }
</style>
<!-- CSS của DataTables -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />


<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

<link href="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection