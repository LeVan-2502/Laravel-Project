<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/velzon/assets/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{ asset('theme/velzon/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/velzon/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('theme/velzon/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('theme/velzon/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('theme/velzon/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>
qxaw ooco auhf rtud
tvyz tolj mxfx tpdi
<body>

    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <!-- auth page bg -->
        <div class="bg-overlay"></div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h2>Admin <strong class="text-primary">DecoNest</strong></h2>
                                    <p class="text-muted">Sign in to continue to Velzon.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('admin.login')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email đăng nhập</label>
                                            <input name="email" type="text" class="form-control" id="email" placeholder="Enter email">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Quên mật khẩu?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Mật khẩu</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input name="password" type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Nhớ mật khẩu</label>
                                        </div>

                                        <div class="mt-4">
                                            @if ($errors->any())
                                            <div id="thongbao-alert" class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show d-flex align-items-center justify-content-between" role="alert">
                                                <i class="ri-close-circle-fill fs-24 label-icon"></i>
                                                <strong>{{ $errors->first() }}</strong>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Đăng nhập</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Đăng nhập bằng </h5>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('theme/velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{ asset('theme/velzon/assets/js/plugins.js')}}"></script>

    <!-- particles js -->
    <script src="{{ asset('theme/velzon/assets/libs/particles.js/particles.js')}}"></script>
    <!-- particles app js -->
    <script src="{{ asset('theme/velzon/assets/js/pages/particles.app.js')}}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('theme/velzon/assets/js/pages/password-addon.init.js')}}"></script>
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
</body>

</html>