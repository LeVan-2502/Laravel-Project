<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/velzon/assets/images/favicon.ico') }}">
    @yield('style')
    <!-- jsvectormap css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />

    <!-- NProgress JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

    <!-- Layout config Js -->
    <script src="{{ asset('theme/velzon/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/velzon/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('theme/velzon/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('theme/velzon/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('theme/velzon/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        label {
            font-weight: bold;
        }

        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffff;
            z-index: 9999;
            display: none;
            /* Ẩn mặc định */
        }

        #nprogress-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            /* Độ cao của thanh tải */
        }

        #nprogress-bar {
            background: #c1121f !important;
            color: #c1121f;
            height: 100%;
            width: 0;
        }

    </style>


</head>

<body>
    <div id="loading-screen">
        <div id="nprogress-container">
            <div class="bar" id="nprogress-bar"></div>
        </div>
    </div>

    @include('admin.layouts.header')
    
    @include('admin.layouts.sidebar')
    
    <div class="vertical-overlay"></div>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col">
                        @yield('content')


                    </div> <!-- end col -->
                </div>

            </div>
            
        </div>
        

        @include('admin.layouts.footer')
    </div>

    </div>

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->


    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- Theme Settings -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
    <script>
        // Hiển thị màn hình tải khi trang bắt đầu tải
        NProgress.start(); // Bắt đầu thanh tải
        document.getElementById('loading-screen').style.display = 'block'; // Hiện loading screen
        
        setTimeout(function() {
            NProgress.done(); // Kết thúc thanh tải
            document.getElementById('loading-screen').style.display = 'none'; // Ẩn màn hình tải
        }, 6000); // Thời gian tải là 3000ms (3 giây)
        // Khi trang hoàn tất tải
        window.onload = function() {
            NProgress.done(); // Kết thúc thanh tải
            document.getElementById('loading-screen').style.display = 'none'; // Ẩn màn hình tải
        };
    </script>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('theme/velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/js/pages/ecommerce-customer-list.init.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


    @yield('script-lib')
    <!-- apexcharts -->

    <!-- App js -->
    <script src="{{ asset('theme/velzon/assets/js/app.js')}}"></script>
    @yield('script')
</body>

</html>