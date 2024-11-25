@extends('client.layouts.master')
@section('content')
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            <div id="title" class="page-title">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            Bed &amp; Bath
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Bed &amp; Bath
                    </div>
                </div>
            </div>

            <div id="content" class="site-content" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="row">
                            @include('client.shop.partials.filter')

                            <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                                <div class="products-topbar clearfix">
                                    <div class="products-topbar-left">
                                        <div class="products-count">
                                            Showing all 21 results
                                        </div>
                                    </div>
                                    <div class="products-topbar-right">
                                        <div class="products-sort dropdown">
                                            <span class="sort-toggle dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Default sorting</span>
                                            <ul class="sort-list dropdown-menu" x-placement="bottom-start">
                                                <li class="active"><a href="#">Default sorting</a></li>
                                                <li><a href="#">Sort by popularity</a></li>
                                                <li><a href="#">Sort by average rating</a></li>
                                                <li><a href="#">Sort by latest</a></li>
                                                <li><a href="#">Sort by price: low to high</a></li>
                                                <li><a href="#">Sort by price: high to low</a></li>
                                            </ul>
                                        </div>
                                        <ul class="layout-toggle nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="layout-grid nav-link active show" data-toggle="tab" href="#layout-grid" role="tab" aria-selected="true"><span class="icon-column"><span class="layer first"><span></span><span></span><span></span></span><span class="layer middle"><span></span><span></span><span></span></span><span class="layer last"><span></span><span></span><span></span></span></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="layout-list nav-link" data-toggle="tab" href="#layout-list" role="tab" aria-selected="false"><span class="icon-column"><span class="layer first"><span></span><span></span></span><span class="layer middle"><span></span><span></span></span><span class="layer last"><span></span><span></span></span></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
                                        <div id="dataContainer" class="products-list grid row">
                                            @if(count($products) > 0)
                                            @foreach($products as $product)
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                                <div class="products-entry clearfix product-wapper">
                                                    <div class="products-thumb">
                                                        <div class="product-lable">
                                                            <div class="hot">Hot</div>
                                                        </div>
                                                        <div class="product-thumb-hover">
                                                            <a href="{{route('client.shop.show',$product['id'])}}">
                                                                <img width="600" height="600" src="{{ \Storage::url($product['hinh_anh']) }}" class="post-image" alt="{{ $product['ten_san_pham'] }}">
                                                                <img width="600" height="600" src="{{ \Storage::url($product['hinh_anh']) }}" class="hover-image back" alt="{{ $product['ten_san_pham'] }}">
                                                            </a>
                                                        </div>
                                                        <div class="product-button">
                                                            <div class="btn-add-to-cart" data-title="Add to cart">
                                                                <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                            </div>
                                                            <div class="btn-wishlist" data-title="Wishlist">
                                                                <button class="product-btn">Add to wishlist</button>
                                                            </div>
                                                            <div class="btn-compare" data-title="Compare">
                                                                <button class="product-btn">Compare</button>
                                                            </div>
                                                            <span class="product-quickview" data-title="Quick View">
                                                                <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="products-content">
                                                        <div class="contents text-center">
                                                            <h3 class="product-title"><a href="{{route('client.shop.show',$product['id'])}}">{{ $product['ten_san_pham'] }}</a></h3>
                                                            <span class="price">{{ number_format($product['gia'], 0, ',', '.') }} VND</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <p>Không có sản phẩm nào để hiển thị.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="layout-list" role="tabpanel">
                                        <div class="products-list list">
                                            <div class="products-entry clearfix product-wapper">
                                                <div class="row">
                                                    @if(count($products) > 0)
                                                    @foreach($products as $product)
                                                    <div class="col-md-4 mb-5">
                                                        <div class="products-thumb">
                                                            <div class="product-lable">
                                                                <div class="hot">Hot</div>
                                                            </div>
                                                            <div class="product-thumb-hover">
                                                                <a href="{{route('client.shop.show',$product['id'])}}">
                                                                    <img width="600" height="600" src="{{ \Storage::url($product['hinh_anh']) }}" class="post-image" alt="">
                                                                    <img width="600" height="600" src="{{ \Storage::url($product['hinh_anh']) }}" class="hover-image back" alt="">
                                                                </a>
                                                            </div>
                                                            <span class="product-quickview" data-title="Quick View">
                                                                <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-5">
                                                        <div class="products-content">
                                                            <h3 class="product-title"><a href="{{route('client.shop.show',$product['id'])}}">{{ $product['ten_san_pham'] }}</a></h3>
                                                            <span class="price">{{ number_format($product['gia'], 0, ',', '.') }} VND</span>
                                                            <div class="rating">
                                                                <div class="star star-5"></div>
                                                                <div class="review-count">
                                                                    (1<span> review</span>)
                                                                </div>
                                                            </div>
                                                            <div class="product-button">
                                                                <div class="btn-add-to-cart" data-title="Add to cart">
                                                                    <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                                </div>
                                                                <div class="btn-wishlist" data-title="Wishlist">
                                                                    <button class="product-btn">Add to wishlist</button>
                                                                </div>
                                                                <div class="btn-compare" data-title="Compare">
                                                                    <button class="product-btn">Compare</button>
                                                                </div>
                                                            </div>
                                                            <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <p>Không có sản phẩm nào để hiển thị.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Phân trang -->
                                    <nav id="demo-pagination" class="pagination">
                                        <ul style="display: flex; justify-content:center;" class="page-numbers">
                                            @if($pagination['prev_page'])
                                            <li><a href="?page={{ $pagination['prev_page'] }}" class="prev page-numbers">&laquo; Previous</a></li>
                                            @endif

                                            @for($i = 1; $i <= $pagination['last_page']; $i++)
                                                <li>
                                                <a href="?page={{ $i }}"
                                                    class="page-numbers {{ $i == $pagination['current_page'] ? 'active' : '' }}"
                                                    style="{{ $i == $pagination['current_page'] ? 'background-color: black; color: white;' : '' }}">
                                                    {{ $i }}
                                                </a>
                                                </li>
                                                @endfor

                                                @if($pagination['next_page'])
                                                <li><a href="?page={{ $pagination['next_page'] }}" class="next page-numbers">Next &raquo;</a></li>
                                                @endif
                                        </ul>
                                    </nav>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/bootstrap/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/feather-font/css/iconfont.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/icomoon-font/css/icomoon.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/font-awesome/css/font-awesome.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/wpbingofont/css/wpbingofont.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/elegant-icons/css/elegant.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/slick/css/slick.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/slick/css/slick-theme.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/mmenu/css/mmenu.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/slider/css/jslider.css')}}">

@endsection

@section('script')


<script src="{{ asset('theme/ruper/libs/popper/js/popper.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/jquery/js/jquery.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slick/js/slick.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/countdown/js/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/mmenu/js/jquery.mmenu.all.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/tmpl.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/jquery.dependClass-0.1.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/draggable-0.1.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/jquery.slider.js')}}"></script>





@endsection