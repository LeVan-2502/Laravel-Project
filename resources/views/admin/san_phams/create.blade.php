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
<form method="POST" enctype="multipart/form-data" action="{{ route('admin.san_phams.store') }}">
    @csrf

    <div class="card">
        <div style="background-color: #d7dbdd  ;" class="card-header">
            <h5> <strong>Thêm mới sản phẩm</strong></h5>
        </div>
        <div class="card-body row">
            <div class="col-6 mb-3">
                <label class="form-label" for="product-title-input">Tên sản phẩm</label>
                <input id="ten_san_pham" type="text" class="form-control" id="product-title-input" value="" name="ten_san_pham" placeholder="Enter product title" required="">
                @error('ten_san_pham')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
            <label for="slug" class="form-label">Slug</label>
            <input value="{{ old('slug') }}" name="slug" type="text" id="slug" class="form-control" placeholder="Enter slug">
                <div class="invalid-feedback">Please Enter a product title.</div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="ten_san_pham" class="form-label">Giá sản phẩm</label>
                            <input value="{{ old('gia') }}" name="gia" type="text" id="gia" class="form-control" placeholder="Enter name">
                            @error('gia')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="gia_khuyen_mai" class="form-label">Giá khuyến mãi</label>
                            <input value="{{ old('gia_khuyen_mai') }}" name="gia_khuyen_mai" type="text" id="gia_khuyen_mai" class="form-control" placeholder="Enter name">
                            @error('gia_khuyen_mai')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="so_luong_ton" class="form-label">Số lượng tồn</label>
                            <input value="{{ old('so_luong_ton') }}" name="so_luong_ton" type="text" id="so_luong_ton" class="form-control" placeholder="Enter name">
                            @error('so_luong_ton')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-3">
                            <label for="thuong_hieu" class="form-label">Thương hiệu</label>
                            <input value="{{ old('thuong_hieu') }}" name="thuong_hieu" type="text" id="thuong_hieu" class="form-control" placeholder="Enter name">
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
                    <div class="col-8">
                        <div class="mb-3">
                            <label>Nội dung</label>
                            <textarea class=form-control name="mo_ta" id="my-textarea-id"></textarea>
                            @error('mo_ta')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3 col-12">
                            <label for="choices-publish-status-input" class="form-label">Danh mục</label>
                            <select class="form-select" id="danh_muc_id" name="danh_muc_id" data-choices="" data-choices-search-false="">
                                <option value="">--Chọn danh mục</option>
                                @foreach($danh_mucs as $id => $ten_danh_muc)
                                <option value="{{$id}}">{{$ten_danh_muc}}</option>
                                @endforeach
                            </select>
                            @error('danh_muc_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Mô tả ngắn</label>
                            <textarea style="height: 180px;" class=form-control name="mo_ta_ngan"></textarea>
                            @error('mo_ta_ngan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Hỉnh thumnail sản phẩm</label>
                            <div class="mb-4">
                                <div class="text-center">
                                    <input class="form-control" name="hinh_anh" type="file" class="hinh_anh">
                                </div>
                            </div>
                            @error('hinh_anh')
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
        <div class="col-9">
            <div class="card">
                <div style="background-color: #d7dbdd  ;" class="card-header">
                    <h5 class="card-title mb-0"><strong>Biến thể sản phẩm</strong></h5>
                </div>
                <div class="card-body">
                    <div style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-hover table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0; // Khởi tạo biến $i trước khi bắt đầu vòng lặp 
                                ?>
                                @foreach($sizes as $sizeID => $tenSize)
                                @foreach($colors as $colorID => $maMau)
                                <tr>
                                    <?php $i++; // Tăng giá trị của biến $i 
                                    ?>
                                    <input type="hidden" value="{{$colorID}}" name="san_pham_bien_the[{{$i}}][san_pham_color_id]">
                                    <input type="hidden" value="{{$sizeID}}" name="san_pham_bien_the[{{$i}}][san_pham_size_id]">
                                    <!-- <input type="hidden" value="{{$sizeID}}" name="san_pham_id"> -->
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1">
                                        </div>
                                    </th>
                                    <td><strong>{{$tenSize}}</strong></td>
                                    <td>
                                        <div style="width:36px;height:36px; background-color:{{$maMau}};"></div>
                                    </td>
                                    <td>
                                        <input type="text" name="san_pham_bien_the[{{$i}}][gia]" id="" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="san_pham_bien_the[{{$i}}][so_luong]" id="" class="form-control">
                                    </td>
                                    <td>
                                        <input type="file" name="san_pham_bien_the[{{$i}}][hinh_anh]" id="" class="form-control">
                                    </td>
                                    <td><a href="javascript:void(0);"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                @endforeach
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="col-12">
                <div class="card">
                    <div style="background-color: #d7dbdd  ;" class="card-header">
                        <h5 class="card-title mb-0"><strong>Thêm Tags</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select name="tag_ids[]" class="form-select" size="6" aria-label="size 5 select example" multiple>

                                @foreach($tags as $id => $ten)
                                <option value="{{$id}}">{{$ten}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <div class="col-12">
                <div class="card">

                    <div style="background-color: #d7dbdd  ;" class="card-header">
                        <h5><strong>Thêm bộ sưu tập hình ảnh sản phẩm</strong></h5>
                    </div>

                    <div class="card-body">
                    <input type="file" name="san_pham_galleries[]" id="fileInput" class="form-control" multiple>
                    <ul id="fileList" class="file-list"></ul>

                    </div>
                </div>
            </div>

            <!-- end card -->

        </div>
    </div>

    <div class="text-left mb-3">
        <button type="submit" class="btn btn-success w-sm">Thêm mới sản phẩm</button>
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
</script>
<script>
    // Khởi tạo CKEditor cho textarea có id 'my-textarea-id'
    CKEDITOR.replace('my-textarea-id', {
        height: 300, // Chiều cao của CKEditor
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