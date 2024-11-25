<style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
</style>
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div style="background-color:#3d405b ; border-bottom: 1px solid #d7dbdd;" class="navbar-brand-box mb-4">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('theme/velzon/assets/images/logo-sm')}}.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('theme/velzon/assets/images/logo-dark')}}.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('theme/velzon/assets/images/logo-sm')}}.png" alt="" height="36">
            </span>
            <span class="logo-lg">
                <img style="width: 100px; height:auto" src="{{ asset('theme/velzon/assets/images/logo-light')}}.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    @php
    $chuc_nangs = [
        [
        'title' => 'Thống kê',
        'links' => [
                    [
                    'name' => 'Tổng quan',
                    'route' => route('admin.dashboard'),
                    ],
                    [
                    'name' => 'Doanh thu',
                    'route' => route('admin.dashboard'),
                    ],
                    [
                    'name' => 'Đơn hàng',
                    'route' => route('admin.dashboard'),
                    ],
                    [
                    'name' => 'Khách hàng',
                    'route' => route('admin.dashboard'),
                    ],
                    [
                    'name' => 'Kho hàng',
                    'route' => route('admin.thong_kes.kho_hang'),
                    ]
        ],
        'icon' => 'ri-dashboard-fill fs-20',
        'dropdown' => 'thongke',
        ],



        [
        'title' => 'Danh mục',
        'links' =>[
                    [
                    'name' => 'Danh sách',
                    'route' => route('admin.danh_mucs.index'),
                    ],
                    [
                    'name' => 'Thêm mới',
                    'route' => route('admin.danh_mucs.create'),
                    ]
                  ],
        'icon' => 'ri-stack-fill fs-20',
        'dropdown' => 'danhmuc',
        ],


        [
        'title' => 'Sản phẩm',
        'links' => [
                    [
                    'name' => 'Danh sách',
                    'route' => route('admin.san_phams.index'),
                    ],
                    [
                    'name' => 'Thêm mới',
                    'route' => route('admin.san_phams.create'),
                    ]
        ],
        'icon' => 'ri-layout-left-2-fill fs-20',
        'dropdown' => 'sanpham',
        ],



    [
    'title' => 'Đơn hàng',
        'links' => [
            [
            'name' => 'Danh sách',
            'route' => route('admin.don_hangs.index'),
            ],
            [
            'name' => 'Thêm mới',
            'route' => route('admin.don_hangs.create'),
            ]
        ],
        'icon' => ' bx bxs-shopping-bag fs-20',
        'dropdown' => 'donhang',
        ],


    [
    'title' => 'Tài khoản',
        'links' => [
                    [
                    'name' => 'Quản trị viên',
                    'route' => route('admin.tai_khoans.quantrivien'),
                    ],
                    [
                    'name' => 'Nhân viên',
                    'route' => route('admin.tai_khoans.nhanvien'),
                    ],
                    [
                    'name' => 'Khách hàng',
                    'route' => route('admin.tai_khoans.khachhang'),
    ]
    ],
    'icon' => 'ri-group-fill fs-20',
    'dropdown' => 'taikhoan',
    ],



    [
    'title' => 'Bình luận',
        'links' => [
            [
            'name' => 'Danh sách',
            'route' => route('admin.binh_luans.index'),
            ],
            [
            'name' => 'Thêm mới',
            'route' => route('admin.don_hangs.create'),
            ]
        ],
        'icon' => ' ri-chat-smile-2-fill fs-20',
        'dropdown' => 'binhluan',
        ],

        [
    'title' => 'Khuyến mãi',
        'links' => [
            [
            'name' => 'Danh sách',
            'route' => route('admin.khuyen_mais.index'),
            ],
            [
            'name' => 'Thêm mới',
            'route' => route('admin.khuyen_mais.create'),
            ]
        ],
        'icon' => ' ri-fire-fill fs-20',
        'dropdown' => 'khuyenmai',
        ],

        

    [
    'title' => 'Cài đặt',
        'links' => [
            [
            'name' => 'Banner',
            'route' => route('admin.banners.index'),
            ],
            [
            'name' => 'Thông tin trang web',
            'route' => route('admin.danh_mucs.create'),
            ]
        ],
        'icon' => 'ri-settings-3-fill fs-20',
        'dropdown' => 'hethong',
    ]
    // Thêm các mục khác nếu cần
    ];


    @endphp
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav mt-4" id="navbar-nav">
              
                @foreach($chuc_nangs as $item)
                <li class="nav-item">
                    <!-- Đảm bảo rằng href và aria-controls đều sử dụng giá trị duy nhất từ $item['title'] -->
                    <a class="nav-link menu-link" href="#{{ $item['dropdown'] }}" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="{{ $item['title'] }}">
                        <i class="{{ $item['icon'] }}"></i> <span data-key="t-dashboards">{{ $item['title'] }}</span>
                    </a>
                    <!-- Đảm bảo rằng id của phần tử collapse cũng là duy nhất -->
                    <div class="collapse menu-dropdown" id="{{ $item['dropdown'] }}">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($item['links'] as $link)
                            <li class="nav-item">
                                <a href="{{ $link['route'] }}" class="nav-link" data-key="t-analytics">{{ $link['name'] }}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                @endforeach

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>