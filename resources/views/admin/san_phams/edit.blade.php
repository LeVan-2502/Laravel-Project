@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Danh mục</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Thêm mới danh mục</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>
    </div>

</div>
<form enctype="multipart/form-data" action="{{ route('admin.san_phams.update', $san_pham->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div style="background-color: #d7dbdd  ;" class="card-header">
            <h5> <strong>Cập nhật thông tin sản phẩm</strong></h5>
        </div>
        <div class="card-body row">
            <div class="col-6 mb-3">
                <label class="form-label" for="product-title-input">Tên sản phẩm</label>
                <input type="text" class="form-control" id="ten_san_pham" value="{{$san_pham->ten_san_pham}}" name="ten_san_pham" placeholder="Enter product title" required="">
                @error('ten_san_pham')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="product-title-input">Slug</label>
                <input value="{{ $san_pham->slug}}" name="slug" type="text" id="slug" class="form-control" placeholder="Enter slug">
                <div class="invalid-feedback">Please Enter a product title.</div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="ten_san_pham" class="form-label">Giá sản phẩm</label>
                            <input value="{{$san_pham->gia}}" name="gia" type="text" id="gia" class="form-control" placeholder="Enter name">
                            @error('gia')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="gia_khuyen_mai" class="form-label">Giá khuyến mãi</label>
                            <input value="{{$san_pham->gia_khuyen_mai}}" name="gia_khuyen_mai" type="text" id="gia_khuyen_mai" class="form-control" placeholder="Enter name">
                            @error('gia_khuyen_mai')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="so_luong_ton" class="form-label">Số lượng tồn</label>
                            <input value="{{$san_pham->so_luong_ton}}" name="so_luong_ton" type="text" id="so_luong_ton" class="form-control" placeholder="Enter name">
                            @error('so_luong_ton')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="thuong_hieu" class="form-label">Thương hiệu</label>
                            <input value="{{$san_pham->thuong_hieu}}" name="thuong_hieu" type="text" id="thuong_hieu" class="form-control" placeholder="Enter name">
                            @error('thuong_hieu')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- end col -->
            </div>
            <div class="col-12">
                <div class="row">

                    <div class="col-3">
                        <div class="mb-3 col-12">
                            <label for="choices-publish-status-input" class="form-label">Danh mục</label>
                            <select class="form-select" id="danh_muc_id" name="danh_muc_id" data-choices="" data-choices-search-false="">
                                <option value="" selected="">--Chọn danh mục</option>
                                @foreach($danh_mucs as $id => $ten_danh_muc)
                                <option value="{{$id}}" {{$san_pham->danh_muc_id =$id ? 'selected' : ''}}>{{$ten_danh_muc}}</option>
                                @endforeach
                            </select>
                            @error('ten_san_pham')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label>Hỉnh thumnail sản phẩm</label>
                            <div class="mb-4">
                                <div class="text-center">
                                    <img style="border-radius: 4px" class="mb-2" width="100%" height="auto" src="{{\Storage::url($san_pham->hinh_anh)}}" alt="">
                                    <input class="form-control bg-danger" name="hinh_anh" type="file">
                                </div>
                            </div>
                            @error('hinh_anh')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="mb-3">
                            <label>Nội dung</label>
                            <textarea class=form-control name="mo_ta" id="my-textarea-id">{{$san_pham->mo_ta}}</textarea>
                            @error('mo_ta')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Mô tả ngắn</label>
                            <textarea style="height: 130px;" class=form-control name="mo_ta_ngan">{{$san_pham->mo_ta_ngan}}</textarea>
                            @error('mo_ta_ngan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end card -->

    <div class="row">
        <div class="col-8">

            <div class="card">
                <div style="background-color: #a8dadc;" class="card-header">
                    <h6 class="card-title mb-0 text-center"><strong>Danh sách biến thể sản phẩm đang tồn tại</strong></h6>
                </div>

                <div class="card">
                    <div style="max-height: 315px; overflow-y: auto;">
                        <table class="table table-hover table-striped table-bordered">
                            <thead style=" box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                                class="position-sticky top-0 bg-white z-idex-10">
                                <tr>

                                    <th scope="col">Size</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($san_pham_bien_thes as $bienThe)
                                <tr>
                                    <?php $i++; ?>
                                    <input type="hidden" value="{{$bienThe->id}}" name="san_pham_bien_the[{{$i}}][id]">
                                    <input type="hidden" value="{{$san_pham->id}}" name="san_pham_bien_the[{{$i}}][san_pham_id]">
                                    <input type="hidden" value="{{$bienThe->san_pham_color_id}}" name="san_pham_bien_the[{{$i}}][san_pham_color_id]">
                                    <input type="hidden" value="{{$bienThe->san_pham_size_id}}" name="san_pham_bien_the[{{$i}}][san_pham_size_id]">
                                    <td class="text-center align-middle"><strong>{{$bienThe->sanPhamSize->ten_size}}</strong></td>
                                    <td class="text-center align-middle">
                                        <div style="width:36px; height:36px; background-color:{{$bienThe->sanPhamColor->ma_mau}};"></div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <input type="text" name="san_pham_bien_the[{{$i}}][sku]" value="{{$bienThe->sku}}" class="form-control">
                                    </td>
                                    <td class="text-center align-middle">
                                        <input type="text" name="san_pham_bien_the[{{$i}}][gia]" value="{{$bienThe->gia}}" class="form-control">
                                    </td>
                                    <td class="text-center align-middle">
                                        <input type="text" name="san_pham_bien_the[{{$i}}][so_luong]" value="{{$bienThe->so_luong}}" class="form-control">
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex flex-row align-items-center">
                                            @if($bienThe->hinh_anh)
                                            <img src="{{\Storage::url($bienThe->hinh_anh)}}" width="50" alt="Hình ảnh biến thể" class="img-thumbnail mb-2">
                                            @endif
                                            <input type="file" name="san_pham_bien_the[{{$i}}][hinh_anh]" class="form-control">
                                            <input value="{{$bienThe->hinh_anh}}" type="text" name="san_pham_bien_the[{{$i}}][hinh_anh_cu]" class="form-control" hidden>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle" id="variant-row-{{$bienThe->id}}">
                                        <a href="javascript:void(0);" onclick="clearRow({{$bienThe->id}})">
                                            <i style="background-color: #e63946; color: white; padding: 0.4rem; border-radius: 4px;" class="ri-delete-bin-7-fill fs-18"></i>
                                        </a>
                                    </td>
                                </tr>


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div style="background-color: #a8dadc;" class="card-header">
                    <h6 class="card-title mb-0 text-center"><strong>Danh sách biến thể sản phẩm đang tồn tại</strong></h6>
                </div>
                <div style="max-height: 315px; overflow-y: auto;">
                    <table class="table table-hover table-striped table-bordered">
                        <thead style=" box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                            class="position-sticky top-0 bg-white z-idex-10">
                            <tr>

                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Tạo một mảng để theo dõi các biến thể đã tồn tại
                            $existingVariants = [];
                            foreach ($san_pham_bien_thes as $bienThe) {
                                $existingVariants[$bienThe->san_pham_size_id][$bienThe->san_pham_color_id] = true;
                            }
                            ?>
                            @foreach($sizes as $sizeID => $tenSize)
                                @foreach($colors as $colorID => $maMau)
                                <?php
                                // Kiểm tra nếu biến thể đã tồn tại thì không hiển thị biến thể mới
                                $isExisting = isset($existingVariants[$sizeID][$colorID]);
                                ?>
                                @if(!$isExisting)
                                <tr>
                                    <?php $i++; ?>
                                    <input type="hidden" value="{{$san_pham->id}}" name="san_pham_bien_the[{{$i}}][san_pham_id]">
                                    <input type="hidden" value="{{$colorID}}" name="san_pham_bien_the[{{$i}}][san_pham_color_id]">
                                    <input type="hidden" value="{{$sizeID}}" name="san_pham_bien_the[{{$i}}][san_pham_size_id]">
                                    <td class="text-center align-middle"><strong>{{$tenSize}}</strong></td>
                                    <td class="text-center align-middle">
                                        <div style="width:36px;height:36px; background-color:{{$maMau}};"></div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <input type="text" name="san_pham_bien_the[{{$i}}][gia]" class="form-control">
                                    </td>
                                    <td class="text-center align-middle">
                                        <input type="text" name="san_pham_bien_the[{{$i}}][so_luong]" class="form-control">
                                    </td>
                                    <td class="text-center align-middle">
                                        <input type="file" name="san_pham_bien_the[{{$i}}][hinh_anh]" class="form-control">
                                    </td>
                                    <td class="text-center align-middle"><a href="javascript:void(0);"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>




        </div>
        <div class="col-4">
            <div class="col-12">
                <div class="card">
                    <div style="background-color: #d7dbdd  ;" class="card-header">
                        <h5 class="card-title mb-0"><strong>Thêm Tags</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select name="tag_ids[]" class="form-select" size="6" aria-label="size 8 select example" multiple>

                                @foreach($tags as $id => $ten)
                                <option value="{{$id}}" {{in_array($id,$san_pham->tags->pluck('id')->toArray()) ? 'selected' : ''}}>{{$ten}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>

                <div class="card">
                    <div style="background-color: #d7dbdd;" class="card-header mb-3">
                        <h5 class="card-title mb-0"><strong>Cập nhật album ảnh sản phẩm</strong></h5>
                    </div>
                    
                    <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                           
                            <th>Nhập file mới</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($galleries as $index => $item)
                            <tr>
                                <td>
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="me-1">
                                            <img width="80px" src="{{\Storage::url($item->hinh_anh)}}" alt="" class="img-thumbnail rounded">
                                        </div>
                                        <div>
                                            <input type="file" name="san_pham_galleries[{{$index}}][hinh_anh]" class="form-control rounded">
                                            <input type="hidden" name="san_pham_galleries[{{$index}}][current_hinh_anh]" value="{{$item->hinh_anh}}">
                                            <input type="hidden" name="san_pham_galleries[{{$index}}][id]" value="{{$item->id}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center align-middle" id="variant-row-{{$item->id}}">
                                    <a href="javascript:void(0);" onclick="clearRowImage({{$item->id}})">
                                        <i style="background-color: #e63946; color: white; padding: 0.4rem; border-radius: 4px;" class="ri-delete-bin-7-fill fs-18"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                        <label for="fileInput">Chọn thêm ảnh vào Album</label>
                        <input type="file" name="san_pham_galleries[new][]" id="fileInput" class="form-control" multiple>
                        <ul id="fileList" class="file-list"></ul>
                    </div>
                </div>

            </div>

            <!-- end card -->

        </div>
    </div>

    <div class="text-left mb-3">
        <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
    </div>
</form>

</div>
@endsection
@section('script-lib')
<script src="//cdn.ckeditor.com/4.22.0/basic/ckeditor.js"></script>



<!-- dropzone js -->
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
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

<script src="{{ asset('theme/velzon/assets/js/pages/ecommerce-product-create.init')}}'"></script>


@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function clearRow(id) {
        if (confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
            var $row = $('#variant-row-' + id).closest('tr');

            if ($row.length) {
                $.ajax({
                    url: '/admin/san_phams/destroy-bienthe/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Nếu xóa thành công, xóa hoàn toàn hàng khỏi bảng
                            $row.remove();
                        } else {
                            console.error('Failed to delete item:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                console.error('Row with id ' + id + ' not found');
            }
        } else {
            // Nếu người dùng không xác nhận, không làm gì cả
            console.log('Xóa mục đã bị hủy bỏ');
        }
    }

    function clearRowImage(id) {
        if (confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
            var $row = $('#variant-row-' + id).closest('tr');

            if ($row.length) {
                $.ajax({
                    url: '/admin/san_phams/destroy-image/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Nếu xóa thành công, xóa hoàn toàn hàng khỏi bảng
                            $row.remove();
                        } else {
                            console.error('Failed to delete item:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                console.error('Row with id ' + id + ' not found');
            }
        } else {
            // Nếu người dùng không xác nhận, không làm gì cả
            console.log('Xóa mục đã bị hủy bỏ');
        }
    }
</script>

<script>
    document.getElementById('ten_san_pham').addEventListener('input', function() {
        // Lấy giá trị từ ô nhập liệu Tên danh mục
        var tenDanhMuc = this.value;

        // Chuyển đổi Tên danh mục thành Slug
        var slug = tenDanhMuc.toLowerCase()
            .normalize('NFD') // Chuẩn hóa Unicode để xử lý các ký tự tiếng Việt
            .replace(/[\u0300-\u036f]/g, '') // Xóa các dấu phụ
            .replace(/[^a-z0-9\s-]/g, '') // Xóa các ký tự đặc biệt không phải chữ cái Latin hoặc số
            .replace(/\s+/g, '-') // Thay thế khoảng trắng bằng dấu gạch ngang
            .replace(/-+/g, '-'); // Loại bỏ các dấu gạch ngang thừa

        // Gán giá trị Slug vào ô nhập liệu Slug
        document.getElementById('slug').value = slug;
    });


    function removeVariant(variantId) {
        if (confirm('Bạn có chắc chắn muốn xóa biến thể này?')) {
            // Tạo input hidden để lưu biến thể cần xóa
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'san_pham_bien_the_delete[]';
            input.value = variantId;

            // Thêm input vào form
            document.querySelector('form').appendChild(input);

            // Ẩn dòng của biến thể đã chọn
            document.querySelector(`tr[data-variant-id="${variantId}"]`).remove();
        }
    }
</script>
<script>
    // Khởi tạo CKEditor cho textarea có id 'my-textarea-id'
    CKEDITOR.replace('my-textarea-id', {
        height: 240, // Chiều cao của CKEditor
        toolbarGroups: [{
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup']
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align']
            },
            {
                name: 'styles'
            },
            {
                name: 'colors'
            }
        ],
    });
</script>

@endsection
@section('style')
<style>
    /* styles.css */
    .file-list {
        list-style-type: none;
        padding: 0;
    }

    .file-list li {

        margin: 5px 0;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
    }
</style>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

<link href="{{ asset('theme/velzon/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


@endsection