<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:16 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>

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
    <link rel="stylesheet" href="{{ asset('theme/ruper/libs/slider/css/jslider.css')}}">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('theme/ruper/assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/ruper/assets/css/responsive.css')}}" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
    <style>
        body.hold-transition {
            width: 100%;
            background:url('/storage/he_thongs/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            height: auto;
            margin: 0;
        }

        #site-main {
            min-height: 100vh;
            /* Độ cao tối thiểu là chiều cao của màn hình */
        }
    </style>
</head>

<body class="hold-transition">
    @yield('content')
    <div class="page-preloader">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>
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
    <!-- Dependency Scripts -->
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

<!-- Mirrored from caketheme.com/html/ruper/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:16 GMT -->

</html>