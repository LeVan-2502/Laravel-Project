@extends('client.layouts.master')
@section('content')
<div style="background-color: #edede9;" id="site-main" class="site-main m-b-4">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            <div id="title" class="page-title">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            Shopping Cart
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Shopping Cart
                    </div>
                </div>
            </div>

            <div id="content" class="site-content" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="shop-cart">
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <form class="cart-form" action="#" method="post">
                                        <div class="table-responsive">
                                            @if (session('success'))
                                            <div style="border-left: 5px solid green; border-radius:0;" id="thongbao-alert" class="alert alert-light alert-dismissible bg-light text-dark alert-label-icon fade show" role="alert">
                                                <i class="ri-notification-off-line label-icon"></i><strong> {{ session('success') }}</strong>

                                            </div>
                                            @endif
                                            <form action="{{route('client.cart.update', Auth::id())}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <table style="background-color: #fff;" class="cart-items table" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Sản phẩm</th>
                                                            <th class="product-price">Giá</th>
                                                            <th class="product-quantity">Số lượng</th>
                                                            <th class="product-subtotal">Tổng</th>
                                                            <th class="product-remove">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $subtotal = 0; // Khai báo biến subtotal ban đầu bằng 0
                                                        @endphp
                                                        @if($data!==null)
                                                        @php $subtotal = 0; @endphp <!-- Khởi tạo subtotal trước khi lặp -->
                                                        @foreach($data as $index => $item)
                                                        <tr class="cart-item">
                                                            <td class="product-thumbnail">
                                                                <a href="shop-details.html">
                                                                    <img width="600" height="600" src="{{ \Storage::url($item['san_pham_bien_the']['hinh_anh']) }}" class="product-image" alt="">
                                                                </a>
                                                                <div class="product-name">
                                                                    <div class="row">
                                                                        <a class="col-12" href="shop-details.html">{{ $item['san_pham_bien_the']['san_pham']['ten_san_pham'] }}</a>
                                                                        <div class="col-12 d-flex">
                                                                            <a href="shop-details.html"><small>{{ $item['san_pham_bien_the']['san_pham']['danh_muc']['ten_danh_muc'] }}</small></a>
                                                                        </div>
                                                                        <div class="col-12 d-flex">
                                                                            <div class="m-l-2" style="width:20px; height:20px; background-color: {{ $item['san_pham_bien_the']['san_pham_color']['ma_mau'] }};"></div>
                                                                            <small class="mx-2">Size: <strong>{{ $item['san_pham_bien_the']['san_pham_size']['ten_size'] }}</strong></small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">
                                                                <span class="price">{{ number_format($item['san_pham_bien_the']['gia'], 0, ',', '.') }} VND</span>
                                                            </td>
                                                            <td class="product-quantity">
                                                                <div class="quantity">
                                                                    <button type="button" class="minus">-</button>
                                                                    <input type="text" name="san_pham_bien_the_id[{{ $index }}]" hidden value="{{ $item['san_pham_bien_the']['id'] }}">
                                                                    <input type="number" class="qty" step="1" min="0" name="so_luong[{{ $index }}]" value="{{ $item['so_luong'] }}" title="Qty" size="4" inputmode="numeric" autocomplete="off">
                                                                    <button type="button" class="plus">+</button>
                                                                </div>
                                                            </td>
                                                            <td class="product-subtotal">
                                                                @php
                                                                $total = $item['san_pham_bien_the']['gia'] * $item['so_luong']; // Tính tổng cho từng sản phẩm
                                                                $subtotal += $total; // Cộng dồn vào tổng phụ
                                                                @endphp
                                                                <span>{{ number_format($total, 0, ',', '.') }} VND</span>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('client.cart.destroy', $item['san_pham_bien_the']['id']) }}" method="POST" >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" style="border-radius: 50%; width: 2rem; height: 2rem; padding: 0; opacity: 90%;" class="btn btn-secondary remove">
                                                                        &times;
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <div class="alert alert-light bg-light text-dark" role="alert">
                                                            <i class="ri-notification-off-line"></i> <strong>Bạn chưa thêm sản phẩm nào vào đơn hàng</strong>
                                                        </div>
                                                        @endif


                                                        <tr>
                                                            <td colspan="6" class="actions">
                                                                <div class="bottom-cart align-item-right">
                                                                    <button type="submit" name="update_cart" class="button" value="Update cart">Cập nhật giỏ hàng</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                        <div class="shop-cart-empty" style="display: none;">
                            <div class="notices-wrapper">
                                <p class="cart-empty">Your cart is currently empty.</p>
                            </div>
                            <div class="return-to-shop">
                                <a class="button" href="shop-grid-left.html">
                                    Return to shop
                                </a>
                            </div>
                        </div>
                        <div class="total_cart">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <form class="cart-form" action="#" method="post">

                                        <table id="totals_cart" class="table" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="actions">
                                                        <div>
                                                            <h2><a style="padding: 10px" class="btn btn-primary" href="shop-grid-left.html">Continue Shopping</a></h2>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-right">
                                                        <div>
                                                            <input type="text" name="coupon_code" class="input-text" id="coupon-code" value="" placeholder="Coupon code">
                                                            <button style="padding: 9px" class="btn btn-secondary" type="submit" name="apply_coupon" class="button" value="Apply coupon">Apply coupon</button>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <h4>TỔNG THANH TOÁN</h4>
                                                        </div>
                                                    </td>
                                                    <td class="text-left">
                                                        <h4> <strong>{{ number_format($subtotal, 0, ',', '.') }} VND</h4>
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <div>
                                                            <h2><a style="padding: 10px" class="btn btn-danger" href="shop-grid-left.html">Tiến hành thanh toán</a></h2>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->

        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>
<div style="background-color: #fff;" id="site-main" class="site-main">
    <div id="main-content" class="section-container">
        <div id="primary" class="content-area">

        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .total_cart {
        z-index: 1000;
        position: fixed;
        bottom: 0;
        right: 0;
        width: 100%;
        background-color: white;
        padding: 0 6% 0 6%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* Bóng phía trên */
    }

    #totals_cart {
        border: none;
    }
</style>
@endsection
@section('script')



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('theme/ruper/libs/popper/js/popper.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/jquery/js/jquery.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slick/js/slick.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/countdown/js/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/mmenu/js/jquery.mmenu.all.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection