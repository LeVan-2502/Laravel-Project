<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:39 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Clean | Ruper</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">

    <!-- Dependency Styles -->
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/feather-font/css/iconfont.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/icomoon-font/css/icomoon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/font-awesome/css/font-awesome.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/wpbingofont/css/wpbingofont.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/elegant-icons/css/elegant.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/slick/css/slick.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/slick/css/slick-theme.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/mmenu/css/mmenu.min.css')}}" type="text/css">
    @yield('style')
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('theme/ruper/assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/assets/css/responsive.css')}}" type="text/css">

    <style>
        #site-header {
            background-color: #fff;
            color: white;

            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Thêm bóng đổ */
            /* Thêm hiệu ứng chuyển tiếp */
        }

        .hidden {
            transform: translateY(-100%);
            /* Ẩn header khi cuộn xuống */
        }

        .profile-img {
            z-index: 1000;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.1);
        }

        .dropdown-menu {
            margin-top: 2rem;
            min-width: 200px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
        }

        .dropdown-item i {
            margin-right: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var lastScrollTop = 0; // Vị trí cuộn trước đó
            var header = $('#site-header');

            $(window).scroll(function() {
                var scrollTop = $(this).scrollTop(); // Vị trí cuộn hiện tại

                if (scrollTop > lastScrollTop) {
                    // Cuộn xuống
                    header.addClass('hidden');
                } else {
                    // Cuộn lên
                    header.removeClass('hidden');
                }

                lastScrollTop = scrollTop; // Cập nhật vị trí cuộn trước đó
            });
        });
    </script>

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
</head>

<body class="home home-5">
    <div id="page" class="hfeed page-wrapper">
        @if(session('user') && session('user')['vai_tro_id'] === 3)
        @include('client.layouts.header-auth') <!-- Header cho customer đã đăng nhập -->
        @else
        @include('client.layouts.header') <!-- Header cho người dùng chưa đăng nhập hoặc người dùng khác -->
        @endif

        <div style="padding-top: 124px;">
            @yield('content')
        </div>

        @include('client.layouts.footer')
    </div>

    <!-- Back Top button -->
    <div class="back-top button-show">
        <i class="arrow_carrot-up"></i>
    </div>

    <!-- Search -->

    @include('client.layouts.partials._search')
    <!-- Wishlist -->
    @include('client.layouts.partials._wishlist')

    <!-- Compare -->
    @include('client.layouts.partials._compare')

    <!-- Quickview -->
    @include('client.layouts.partials._quickview')

    <!-- Page Loader -->
    <div class="page-preloader">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Tự động đóng thông báo sau 5 giây (5000ms)
        setTimeout(function() {
            var alert = document.getElementById('thongbao-alert');
            if (alert) {
                // Sử dụng Bootstrap để đóng alert
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 10000); // 5000ms = 5 giây
    </script>
    <!-- Dependency Scripts -->

    @yield('script')
    <!-- Site Scripts -->
    <script src="{{ asset('theme/ruper/assets/js/app.js')}}"></script>

    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>

<!-- Mirrored from caketheme.com/html/ruper/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:42 GMT -->

</html>