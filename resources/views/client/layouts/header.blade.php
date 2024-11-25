<header id="site-header" class="site-header header-v2">
    <div id="header-topbar" class="topbar-v1 hidden-sm hidden-xs">
        <div class="topbar-inner">
            <div class="section-padding">
                <div class="section-container p-l-r">
                    <div class="row">
                        <div class="col-md-6 topbar-left">
                            <div class="block block-html">
                                <div class="address hidden-xs">
                                    <a href="#"><i class="icon-pin"></i>Find Store</a>
                                </div>
                                <div class="email hidden-xs">
                                    <i class="icon-envelope"></i><a href="mailto:support@ruper.com">support@ruper.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 topbar-right">
                            <ul id="topbar-menu" class="menu">
                                <li class="menu-item"><a href="#">Gift Cards</a></li>
                                <li class="menu-item"><a href="page-faq.html">FAQs</a></li>
                                <li class="menu-item"><a href="page-contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-mobile">
        <div class="section-padding">
            <div class="section-container large">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
                        <div class="navbar-header">
                            <button type="button" id="show-megamenu" class="navbar-toggle"></button>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
                        <div class="site-logo">
                            <a href="index2.html">
                                <img width="400" height="79" src="{{ asset('theme/ruper/media/logo.png')}}')}}" alt="Ruper – Furniture HTML Theme" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
                        <div class="ruper-topcart dropdown">
                            <div class="dropdown mini-cart top-cart">
                                <div class="remove-cart-shadow"></div>
                                <a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">2</span></div>
                                </a>
                                <div class="dropdown-menu cart-popup">
                                    <div class="cart-empty-wrap">
                                        <ul class="cart-list">
                                            <li class="empty">
                                                <span>No products in the cart.</span>
                                                <a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-list-wrap">
                                        <ul class="cart-list ">
                                            <li class="mini-cart-item">
                                                <a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
                                                <a href="shop-details.html" class="product-image"><img width="600" height="600" src="{{ asset('theme/ruper/media/product/3.jpg')}}" alt=""></a>
                                                <a href="shop-details.html" class="product-name">Chair Oak Matt Lacquered</a>
                                                <div class="quantity">Qty: 1</div>
                                                <div class="price">$150.00</div>
                                            </li>
                                            <li class="mini-cart-item">
                                                <a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
                                                <a href="shop-details.html" class="product-image"><img width="600" height="600" src="{{ asset('theme/ruper/media/product/1.jpg')}}" alt=""></a>
                                                <a href="shop-details.html" class="product-name">Zunkel Schwarz</a>
                                                <div class="quantity">Qty: 1</div>
                                                <div class="price">$100.00</div>
                                            </li>
                                        </ul>
                                        <div class="total-cart">
                                            <div class="title-total">Total: </div>
                                            <div class="total-price"><span>$100.00</span></div>
                                        </div>
                                        <div class="free-ship">
                                            <div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
                                            <div class="total-percent">
                                                <div class="percent" style="width:20%"></div>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
                                            <a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-mobile-fixed">
            <!-- Shop -->
            <div class="shop-page">
                <a href="shop-grid-left.html"><i class="wpb-icon-shop"></i></a>
            </div>

            <!-- Login -->
            <div class="my-account">
                <div class="login-header">
                    <a href="page-my-account.html"><i class="wpb-icon-user"></i></a>
                </div>
            </div>

            <!-- Search -->
            <div class="search-box">
                <div class="search-toggle"><i class="wpb-icon-magnifying-glass"></i></div>
            </div>

            <!-- Wishlist -->
            <div class="wishlist-box">
                <a href="shop-wishlist.html"><i class="wpb-icon-heart"></i></a>
            </div>
        </div>
    </div>

    <div class="header-desktop">
        <div class="header-wrapper">
            <div class="section-padding">
                <div class="section-container p-l-r">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 header-left">
                            <div class="site-navigation">
                                <nav id="main-navigation">
                                    <ul id="menu-main-menu" class="menu">
                                        <li class="level-0 menu-item menu-item-has-children mega-menu <?= ($_SERVER['REQUEST_URI'] == '/') ? 'current-menu-item' : '' ?>">
                                            <a href="{{route('client.home')}}"><span class="menu-item-text">Trang chủ</span></a>
                                          
                                        </li>
                                        <li class="level-0 menu-item menu-item-has-children <?= ($_SERVER['REQUEST_URI'] == '/shop') ? 'current-menu-item' : '' ?>">
                                            <a href="{{route('client.shop.index')}}"><span class="menu-item-text">Cửa hàng</span></a>
                                            <ul class="sub-menu">
                                                <li class="level-1 menu-item menu-item-has-children">
                                                    <a href="shop-grid-left.html"><span class="menu-item-text">Shop - Products</span></a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="shop-grid-left.html"><span class="menu-item-text">Shop Grid - Left Sidebar</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list-left.html"><span class="menu-item-text">Shop List - Left Sidebar</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-grid-right.html"><span class="menu-item-text">Shop Grid - Right Sidebar</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list-right.html"><span class="menu-item-text">Shop List - Right Sidebar</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-grid-fullwidth.html"><span class="menu-item-text">Shop Grid - No Sidebar</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="shop-details.html"><span class="menu-item-text">Shop Details</span></a>
                                                </li>
                                                <li>
                                                    <a href="shop-cart.html"><span class="menu-item-text">Shop - Cart</span></a>
                                                </li>
                                                <li>
                                                    <a href="shop-checkout.html"><span class="menu-item-text">Shop - Checkout</span></a>
                                                </li>
                                                <li>
                                                    <a href="shop-wishlist.html"><span class="menu-item-text">Shop - Wishlist</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="level-0 menu-item menu-item-has-children mega-menu mega-menu-fullwidth <?= ($_SERVER['REQUEST_URI'] == '/blog') ? 'current-menu-item' : '' ?>">
                                            <a href="blog-grid-left.html"><span class="menu-item-text">Blog</span></a>
                                            <div class="sub-menu">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="menu-section">
                                                            <h2 class="sub-menu-title">Blog Category</h2>
                                                            <ul class="menu-list">
                                                                <li>
                                                                    <a href="blog-grid-left.html"><span class="menu-item-text">Blog Grid - Left Sidebar</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="blog-grid-right.html"><span class="menu-item-text">Blog Grid - Right Sidebar</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="blog-list-left.html"><span class="menu-item-text">Blog List - Left Sidebar</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="blog-list-right.html"><span class="menu-item-text">Blog List - Right Sidebar</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="blog-grid-fullwidth.html"><span class="menu-item-text">Blog Grid - No Sidebar</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="menu-section">
                                                            <h2 class="sub-menu-title">Blog Details</h2>
                                                            <ul class="menu-list">
                                                                <li>
                                                                    <a href="blog-details-left.html"><span class="menu-item-text">Blog Details - Left Sidebar</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="blog-details-right.html"><span class="menu-item-text">Blog Details - Right Sidebar</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="blog-details-fullwidth.html"><span class="menu-item-text">Blog Details - No Sidebar</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="menu-section">
                                                            <h2 class="sub-menu-title">Recent Posts</h2>
                                                            <div class="block block-posts recent-posts p-t-5">
                                                                <ul class="posts-list">
                                                                    <li class="post-item">
                                                                        <a href="blog-details-right.html" class="post-image">
                                                                            <img src="{{ asset('theme/ruper/media/blog/1.jpg')}}">
                                                                        </a>
                                                                        <div class="post-content">
                                                                            <h2 class="post-title">
                                                                                <a href="blog-details-right.html">
                                                                                    Easy Fixes For Home Decor
                                                                                </a>
                                                                            </h2>
                                                                            <div class="post-time">
                                                                                <span class="post-date">May 30, 2022</span>
                                                                                <span class="post-comment">4 Comments</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="post-item">
                                                                        <a href="blog-details-right.html" class="post-image">
                                                                            <img src="{{ asset('theme/ruper/media/blog/2.jpg')}}">
                                                                        </a>
                                                                        <div class="post-content">
                                                                            <h2 class="post-title">
                                                                                <a href="blog-details-right.html">
                                                                                    How To Make Your Home A Showplace
                                                                                </a>
                                                                            </h2>
                                                                            <div class="post-time">
                                                                                <span class="post-date">Aug 24, 2022</span>
                                                                                <span class="post-comment">2 Comments</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="post-item">
                                                                        <a href="blog-details-right.html" class="post-image">
                                                                            <img src="{{ asset('theme/ruper/media/blog/3.jpg')}}">
                                                                        </a>
                                                                        <div class="post-content">
                                                                            <h2 class="post-title">
                                                                                <a href="blog-details-right.html">
                                                                                    Stunning Furniture With Aesthetic Appeal
                                                                                </a>
                                                                            </h2>
                                                                            <div class="post-time">
                                                                                <span class="post-date">Dec 06, 2022</span>
                                                                                <span class="post-comment">1 Comment</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                       
                                        <li class="level-0 menu-item <?= ($_SERVER['REQUEST_URI'] == '/contact') ? 'current-menu-item' : '' ?>">
                                            <a href="page-contact.html"><span class="menu-item-text">Liên hệ</span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 text-center header-center">
                            <div class="site-logo">
                                <a href="index2.html">
                                    <img width="400" height="79" src="{{ asset('theme/ruper/media/logo.png')}}" alt="Ruper – Furniture HTML Theme" />
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 header-right">
                            <div class="header-page-link">
                                <!-- Login -->
                                <div class="login-header">
                                    <a class="active-login" href="{{route('client.login')}}">Login</a>
                                </div>

                                <!-- Search -->
                                <div class="search-box">
                                    <div class="search-toggle"><i class="icon-search"></i></div>
                                </div>

                                <!-- Wishlist -->
                                <div class="wishlist-box">
                                    <a href="shop-wishlist.html"><i class="icon-heart"></i></a>
                                    <span class="count-wishlist">1</span>
                                </div>

                                <!-- Cart -->
                                <div class="ruper-topcart dropdown light">
                                    <div class="dropdown mini-cart top-cart">
                                        <div class="remove-cart-shadow"></div>
                                        <a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">2</span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>