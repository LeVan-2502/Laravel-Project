@extends('admin.layouts.master')
@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">{{$table}}</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.san_phams.index')}}">Danh sách {{$table}}</a></li>

            <li class="breadcrumb-item active">Chi tiết {{$table}}</li>
        </ol>
    </div>

</div>
<div class="card">
    <div class="card-body">
        <div class="row gx-lg-5">
            <div class="col-xl-4 col-md-8 mx-auto">
                <div class="product-img-slider sticky-side-div">
                    <!-- Swiper Thumbnail Slider -->
                    <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                        <div class="swiper-wrapper">
                            @foreach($galleries as $index => $hinh_anh)
                            <div class="swiper-slide">
                                <img src="{{\Storage::url($hinh_anh)}}" alt="" class="img-fluid d-block">
                            </div>
                            @endforeach
                        </div>
                        <!-- Swiper Navigation -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <!-- Swiper Navigation Slider -->
                    <div class="swiper product-nav-slider mt-2">
                        <div class="swiper-wrapper">
                            @foreach($galleries as $index => $hinh_anh)
                            <div class="swiper-slide">
                                <div class="nav-slide-item">
                                    <img src="{{\Storage::url($hinh_anh)}}" alt="" class="img-fluid d-block">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!-- end col -->

            <div class="col-xl-8">
                <div class="mt-xl-0 mt-5">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h4>{{$san_pham->ten_san_pham}}</h4>
                            <div class="hstack gap-3 flex-wrap">
                                <div><a href="#" class="text-primary d-block">{{$san_pham->thuong_hieu}}</a></div>
                                <div class="vr"></div>
                                <div class="text-muted">Seller : <span class="text-body fw-medium">Zoetic Fashion</span></div>
                                <div class="vr"></div>
                                <div class="text-muted">Published : <span class="text-body fw-medium">26 Mar, 2021</span></div>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <div>
                                <a href="{{ route('admin.san_phams.edit', $san_pham->id)}}" class="btn btn-warning"><span class="mg-2">Sửa thông tin</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                        <div class="text-muted fs-16">
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star text-warning"></span>
                        </div>
                        <div class="text-muted">( 5.50k Lượt bình luận )</div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-3 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded text-white fs-24">
                                            <i style="background-color: 81b29a;" class="ri-money-dollar-circle-fill fs-36"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">GIÁ</p>
                                        <h5 class="mb-0">$120.40</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded text-white fs-24">
                                            <i style="background-color: 81b29a;" class="ri-file-copy-2-fill fs-36"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">LƯỢT KHÁCH HÀNG</p>
                                        <h5 class="mb-0">2,234</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded text-white fs-24">
                                            <i style="background-color: 81b29a;" class="ri-stack-fill fs-36"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">ĐÃ BÁN</p>
                                        <h5 class="mb-0">1,230</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded text-white fs-24">
                                            <i style="background-color: 81b29a;" class="ri-inbox-archive-fill fs-36"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">TỔNG GIÁ TRỊ</p>
                                        <h5 class="mb-0">$60,645</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>

                    <!-- end row -->

                    <div class="mt-4 text-muted">
                        <h5 class="fs-14">Mô tả :</h5>
                        <p>{{$san_pham->mo_ta_ngan}}</p>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <h5 class="fs-14">Features :</h5>
                                <ul class="list-unstyled">
                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Full Sleeve</li>
                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Cotton</li>
                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> All Sizes available</li>
                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> 4 Different Color</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-3">
                                <h5 class="fs-14">Services :</h5>
                                <ul class="list-unstyled product-desc-list">
                                    <li class="py-1">10 Days Replacement</li>
                                    <li class="py-1">Cash on Delivery available</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="product-content mt-5">
                        <h5 class="fs-14 mb-3">Thông tin chi tiết</h5>
                        <nav>
                            <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Thông tin chung</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false" tabindex="-1">Chi tiết</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="nav-danh-gia-tab" data-bs-toggle="tab" href="#nav-danh-gia" role="tab" aria-controls="nav-danh-gia" aria-selected="false" tabindex="-1">Đánh giá</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="nav-binh-luan-tab" data-bs-toggle="tab" href="#nav-binh-luan" role="tab" aria-controls="nav-binh-luan" aria-selected="false" tabindex="-1">Bình luận</a>
                                </li>

                            </ul>
                        </nav>
                        <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 200px;">Category</th>
                                                <td>{{$san_pham->danhMuc->ten_danh_muc}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Brand</th>
                                                <td>{{$san_pham->thuong_hieu}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Color</th>
                                                <td>
                                                    <div class="d-flex">
                                                        @foreach($colorBienThe as $item)
                                                        <div style="margin-right:6px; border-radius:50%; 
                                                            width:32px;height:32px; background-color:{{$item}}; "></div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Size</th>
                                                <td>
                                                    <div class="d-flex">
                                                        @foreach($sizeBienThe as $item)
                                                        <div style="margin-right:6px; border-radius:50%; width:40px; height:40px; background-color:#dcd7dd; 
                                                            display: flex; justify-content: center; align-items: center;">
                                                            {{$item}}
                                                        </div>

                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Chất liệu</th>
                                                <td>Cotton</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Trọng lượng</th>
                                                <td>140 Gram</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                <div>
                                    <h5 class="font-size-16 mb-3">Tommy Hilfiger Sweatshirt for Men (Pink)</h5>
                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                    <div>
                                        <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Machine Wash</p>
                                        <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Fit Type: Regular</p>
                                        <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> 100% Cotton</p>
                                        <p class="mb-0"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Long sleeve</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-danh-gia" role="tabpanel" aria-labelledby="nav-danh-gia-tab">
                                <div>
                                    <div class="col-lg-12">
                                        <div>
                                            <div class="pb-3">
                                                <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <div class="fs-16 align-middle text-warning">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-half-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0">4.5 out of 5</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">5 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">2758</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">4 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 19.32%" aria-valuenow="19.32" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">1063</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">3 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">997</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">2 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">408</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">1 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">274</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-binh-luan" role="tabpanel" aria-labelledby="nav-binh-luan-tab">
                                <div>
                                    <div class="col-lg-8">
                                        <div class="ps-lg-4">
                                            <div class="d-flex flex-wrap align-items-start gap-3">
                                                <h5 class="fs-14">Bình luận về sản phẩm </h5>
                                            </div>

                                            <div class="me-lg-n3 pe-lg-4 simplebar-scrollable-y" data-simplebar="init" style="max-height: 225px;">
                                                <div class="simplebar-wrapper" style="margin: 0px -24px 0px 0px;">
                                                    <div class="simplebar-height-auto-observer-wrapper">
                                                        <div class="simplebar-height-auto-observer"></div>
                                                    </div>
                                                    <div class="simplebar-mask">
                                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                                                <div class="simplebar-content" style="padding: 0px 24px 0px 0px;">
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li class="py-2">
                                                                            <div class="border border-dashed rounded p-3">
                                                                                <div class="d-flex align-items-start mb-3">
                                                                                    <div class="hstack gap-3">
                                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                                            <i class="mdi mdi-star"></i> 4.2
                                                                                        </div>
                                                                                        <div class="vr"></div>
                                                                                        <div class="flex-grow-1">
                                                                                            <p class="text-muted mb-0"> Superb sweatshirt. I loved it. It is for winter.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex flex-grow-1 gap-2 mb-3">
                                                                                    <a href="#" class="d-block">
                                                                                        <img src="{{ asset('theme/velzon/assets/images/small/img-12.jpg')}}" alt="" class="avatar-sm rounded object-fit-cover">
                                                                                    </a>
                                                                                    <a href="#" class="d-block">
                                                                                        <img src="{{ asset('theme/velzon/assets/images/small/img-11.jpg')}}" alt="" class="avatar-sm rounded object-fit-cover">
                                                                                    </a>
                                                                                    <a href="#" class="d-block">
                                                                                        <img src="{{ asset('theme/velzon/assets/images/small/img-10.jpg')}}" alt="" class="avatar-sm rounded object-fit-cover">
                                                                                    </a>
                                                                                </div>

                                                                                <div class="d-flex align-items-end">
                                                                                    <div class="flex-grow-1">
                                                                                        <h5 class="fs-14 mb-0">Henry</h5>
                                                                                    </div>

                                                                                    <div class="flex-shrink-0">
                                                                                        <p class="text-muted fs-13 mb-0">12 Jul, 21</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="py-2">
                                                                            <div class="border border-dashed rounded p-3">
                                                                                <div class="d-flex align-items-start mb-3">
                                                                                    <div class="hstack gap-3">
                                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                                            <i class="mdi mdi-star"></i> 4.0
                                                                                        </div>
                                                                                        <div class="vr"></div>
                                                                                        <div class="flex-grow-1">
                                                                                            <p class="text-muted mb-0"> Great at this price, Product quality and look is awesome.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-end">
                                                                                    <div class="flex-grow-1">
                                                                                        <h5 class="fs-14 mb-0">Nancy</h5>
                                                                                    </div>

                                                                                    <div class="flex-shrink-0">
                                                                                        <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <li class="py-2">
                                                                            <div class="border border-dashed rounded p-3">
                                                                                <div class="d-flex align-items-start mb-3">
                                                                                    <div class="hstack gap-3">
                                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                                            <i class="mdi mdi-star"></i> 4.2
                                                                                        </div>
                                                                                        <div class="vr"></div>
                                                                                        <div class="flex-grow-1">
                                                                                            <p class="text-muted mb-0">Good product. I am so happy.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-end">
                                                                                    <div class="flex-grow-1">
                                                                                        <h5 class="fs-14 mb-0">Joseph</h5>
                                                                                    </div>

                                                                                    <div class="flex-shrink-0">
                                                                                        <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <li class="py-2">
                                                                            <div class="border border-dashed rounded p-3">
                                                                                <div class="d-flex align-items-start mb-3">
                                                                                    <div class="hstack gap-3">
                                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                                            <i class="mdi mdi-star"></i> 4.1
                                                                                        </div>
                                                                                        <div class="vr"></div>
                                                                                        <div class="flex-grow-1">
                                                                                            <p class="text-muted mb-0">Nice Product, Good Quality.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-end">
                                                                                    <div class="flex-grow-1">
                                                                                        <h5 class="fs-14 mb-0">Jimmy</h5>
                                                                                    </div>

                                                                                    <div class="flex-shrink-0">
                                                                                        <p class="text-muted fs-13 mb-0">24 Jun, 21</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="simplebar-placeholder" style="width: 873px; height: 483px;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                                    <div class="simplebar-scrollbar" style="height: 104px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- product-content -->


                    <!-- end card body -->
                </div>
                <div class="card">
                    <div class="card-header">
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
                                        <th scope="col">SKU</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($san_pham_bien_thes as $index => $item)
                                    <tr class=""> <!-- Căn giữa nội dung trong mỗi hàng -->
                                        <th scope="col" class="align-middle">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1">
                                            </div>
                                        </th>
                                        <td class="col"><strong>{{$item->sanPhamSize->ten_size}}</strong></td>
                                        <td class="col">
                                            <div style="width:36px;height:36px; background-color:{{$item->sanPhamColor->ma_mau}};"></div>
                                        </td>
                                        <td class="col">
                                        <strong>{{$item->sanPhamSize->sku}}</strong>
                                        </td>
                                        <td class="col">
                                            <img width="50px" src="{{\Storage::url($item->hinh_anh)}}" alt="">
                                        </td>
                                        <td class="col">
                                            {{$item->gia}}
                                        </td>
                                        <td class="col">
                                            {{$item->so_luong}}
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
<!-- container-fluid -->


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
    document.addEventListener('DOMContentLoaded', function() {
        // Thay đổi cấu hình Swiper theo nhu cầu của bạn
        const swiperThumbnail = new Swiper('.product-thumbnail-slider', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: swiperNav,
            },
        });

        const swiperNav = new Swiper('.product-nav-slider', {
            spaceBetween: 10,
            slidesPerView: 4, // Hiển thị 4 ảnh trong phần điều hướng
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            slideToClickedSlide: true,
            touchRatio: 1, // Điều chỉnh độ nhạy khi chạm, càng lớn thì càng nhạy
            touchAngle: 45, // Góc tối thiểu để kích hoạt cuộn ngang
        });
    });
</script>

@endsection
@section('script-lib')
<!--Swiper slider js-->
<script src="{{ asset('theme/velzon/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- ecommerce product details init -->
<script src="{{ asset('theme/velzon/assets/js/pages/ecommerce-product-details.init.js')}}"></script>

@endsection

@section('style')
<link href="{{ asset('theme/velzon/assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
<style>

  
</style>
@endsection