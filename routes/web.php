<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BannerProgramController;
use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\ThongKeController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\ClientAuthController;
use App\Models\BinhLuan;
use App\Models\KhuyenMai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client.home.index');
})->name('client.home');




Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login']);

Route::get('login', [LoginController::class, 'showLoginFormClient'])->name('client.login');
Route::post('login', [LoginController::class, 'login']);    
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('client.register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('email/verify', [EmailVerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
// CLIENT 
Route::get('/shop', [ShopController::class, 'index'])->name('client.shop.index'); // Trang danh sách
Route::get('/product/{id}', [ShopController::class, 'show'])->name('client.shop.show'); // Trang danh sách
Route::get('/cart', [CartController::class, 'index'])->name('client.cart.index'); // Trang danh sách
Route::post('/cart/store/{gio_hang_id}', [CartController::class, 'store'])->name('client.cart.store'); // Trang danh sách
Route::put('/cart/update/{gio_hang_id}', [CartController::class, 'update'])->name('client.cart.update'); // Trang danh sách
Route::delete('/cart/destroy/{bien_the_id}', [CartController::class, 'destroy'])->name('client.cart.destroy'); // Trang danh sách






Route::prefix('/admin')->group(function () {
    Route::middleware(['auth'])->get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Danh mục
    Route::prefix('danh_mucs')->group(function () {
        Route::get('/', [DanhMucController::class, 'index'])->name('admin.danh_mucs.index');
        Route::get('create', [DanhMucController::class, 'create'])->name('admin.danh_mucs.create');
        Route::post('store', [DanhMucController::class, 'store'])->name('admin.danh_mucs.store');
        Route::get('show/{id}', [DanhMucController::class, 'show'])->name('admin.danh_mucs.show');
        Route::get('{id}/edit', [DanhMucController::class, 'edit'])->name('admin.danh_mucs.edit');
        Route::put('{id}/update', [DanhMucController::class, 'update'])->name('admin.danh_mucs.update');
        Route::get('{id}/destroy', [DanhMucController::class, 'destroy'])->name('admin.danh_mucs.destroy');
        Route::get('filter', [DanhMucController::class, 'filter'])->name('admin.danh_mucs.filter');
        Route::delete('delete-selected', [DanhMucController::class, 'deleteSelected'])->name('admin.danh_mucs.delete-selected');
    });

    // Tài khoản
    Route::prefix('tai_khoans')->group(function () {
        Route::get('qtv', [TaiKhoanController::class, 'quantrivien'])->name('admin.tai_khoans.quantrivien');
        Route::get('nv', [TaiKhoanController::class, 'nhanvien'])->name('admin.tai_khoans.nhanvien');
        Route::get('kh', [TaiKhoanController::class, 'khachhang'])->name('admin.tai_khoans.khachhang');
        Route::get('create', [TaiKhoanController::class, 'create'])->name('admin.tai_khoans.create');
        Route::post('store', [TaiKhoanController::class, 'store'])->name('admin.tai_khoans.store');
        Route::get('show/{id}', [TaiKhoanController::class, 'show'])->name('admin.tai_khoans.show');
        Route::get('{id}/edit', [TaiKhoanController::class, 'edit'])->name('admin.tai_khoans.edit');
        Route::patch('{id}/update', [TaiKhoanController::class, 'update'])->name('admin.tai_khoans.update');
        Route::patch('{id}/update-image', [TaiKhoanController::class, 'updateImage'])->name('admin.tai_khoans.update-image');
        Route::patch('{id}/update-pass', [TaiKhoanController::class, 'updatePass'])->name('admin.tai_khoans.update-pass');
        Route::get('{id}/destroy', [TaiKhoanController::class, 'destroy'])->name('admin.tai_khoans.destroy');
        Route::get('filter', [TaiKhoanController::class, 'filter'])->name('admin.tai_khoans.filter');
        Route::delete('delete-selected', [TaiKhoanController::class, 'deleteSelected'])->name('admin.tai_khoans.delete-selected');
    });
    // Tài khoản
    Route::prefix('san_phams')->group(function () {
        Route::get('/', [SanPhamController::class, 'index'])->name('admin.san_phams.index');
        Route::get('create', [SanPhamController::class, 'create'])->name('admin.san_phams.create');
        Route::post('store', [SanPhamController::class, 'store'])->name('admin.san_phams.store');
        Route::get('show/{id}', [SanPhamController::class, 'show'])->name('admin.san_phams.show');
        Route::get('{id}/edit', [SanPhamController::class, 'edit'])->name('admin.san_phams.edit');
        Route::put('{id}/update', [SanPhamController::class, 'update'])->name('admin.san_phams.update');
        Route::patch('{id}/update-image', [SanPhamController::class, 'updateImage'])->name('admin.san_phams.update-image');
        Route::patch('{id}/update-pass', [SanPhamController::class, 'updatePass'])->name('admin.san_phams.update-pass');
        Route::get('{id}/destroy', [SanPhamController::class, 'destroy'])->name('admin.san_phams.destroy');
        Route::delete('delete-selected', [SanPhamController::class, 'deleteSelected'])->name('admin.san_phams.delete-selected');
        Route::delete('/destroy-bienthe/{id}', [SanPhamController::class, 'destroyBienThe'])->name('admin.san_phams.destroy-bienthe');
        Route::delete('/destroy-image/{id}', [SanPhamController::class, 'destroyImage'])->name('admin.san_phams.destroy-image');
    });
    // Đơn hàng
    Route::prefix('don_hangs')->group(function () {
        Route::get('/', [DonHangController::class, 'index'])->name('admin.don_hangs.index');
        Route::get('create', [DonHangController::class, 'create'])->name('admin.don_hangs.create');
        Route::post('store', [DonHangController::class, 'store'])->name('admin.don_hangs.store');
        Route::get('show/{id}', [DonHangController::class, 'show'])->name('admin.don_hangs.show');
        Route::get('{id}/edit', [DonHangController::class, 'edit'])->name('admin.don_hangs.edit');
        Route::put('{id}/update', [DonHangController::class, 'update'])->name('admin.don_hangs.update');
        Route::patch('{id}/update-image', [DonHangController::class, 'updateImage'])->name('admin.don_hangs.update-image');
        Route::patch('{id}/update-pass', [DonHangController::class, 'updatePass'])->name('admin.don_hangs.update-pass');
        Route::get('{id}/destroy', [DonHangController::class, 'destroy'])->name('admin.don_hangs.destroy');

        Route::post('update-status', [DonHangController::class, 'updateStatus'])->name('admin.don_hangs.update-status');
        Route::post('update-bienthe', [DonHangController::class, 'updateBienThe'])->name('admin.don_hangs.update-bienthe');
        Route::post('add-sanpham', [DonHangController::class, 'addSanPham'])->name('admin.don_hangs.add-sanpham');
        Route::post('add-vanchuyen', [DonHangController::class, 'addVanChuyen'])->name('admin.don_hangs.add-vanchuyen');
        Route::post('cancel', [DonHangController::class, 'cancel'])->name('admin.don_hangs.cancel');
        Route::post('delete-sanpham', [DonHangController::class, 'deleteSanPham'])->name('admin.don_hangs.delete-sanpham');

        Route::delete('delete-selected', [DonHangController::class, 'deleteSelected'])->name('admin.don_hangs.delete-selected');
        Route::delete('/destroy-bienthe/{id}', [DonHangController::class, 'destroyBienThe'])->name('admin.don_hangs.destroy-bienthe');
        Route::delete('/destroy-image/{id}', [DonHangController::class, 'destroyImage'])->name('admin.don_hangs.destroy-image');
    });

    // Bình luận 
    Route::prefix('binh_luans')->group(function () {
        Route::get('/', [BinhLuanController::class, 'index'])->name('admin.binh_luans.index');
        Route::get('create', [BinhLuanController::class, 'create'])->name('admin.binh_luans.create');
        Route::post('store', [BinhLuanController::class, 'store'])->name('admin.binh_luans.store');
        Route::get('show/{id}', [BinhLuanController::class, 'show'])->name('admin.binh_luans.show');
        Route::get('{id}/edit', [BinhLuanController::class, 'edit'])->name('admin.binh_luans.edit');

        Route::post('update', [BinhLuanController::class, 'update'])->name('admin.binh_luans.update');
        Route::post('destroy', [BinhLuanController::class, 'destroy'])->name('admin.binh_luans.destroy');
        Route::delete('delete-selected', [BinhLuanController::class, 'deleteSelected'])->name('admin.binh_luans.delete-selected');
    });

    Route::prefix('khuyen_mais')->group(function () {
        Route::get('/', [KhuyenMaiController::class, 'index'])->name('admin.khuyen_mais.index');
        Route::get('create', [KhuyenMaiController::class, 'create'])->name('admin.khuyen_mais.create');
        Route::post('store', [KhuyenMaiController::class, 'store'])->name('admin.khuyen_mais.store');
        Route::get('show/{id}', [KhuyenMaiController::class, 'show'])->name('admin.khuyen_mais.show');
        Route::get('{id}/edit', [KhuyenMaiController::class, 'edit'])->name('admin.khuyen_mais.edit');
        Route::put('{id}/update', [KhuyenMaiController::class, 'update'])->name('admin.khuyen_mais.update');
        Route::get('{id}/destroy', [KhuyenMaiController::class, 'destroy'])->name('admin.khuyen_mais.destroy');
    });

    Route::prefix('banners')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banners.index');
        Route::get('create', [BannerController::class, 'create'])->name('admin.banners.create');
        Route::post('store', [BannerController::class, 'store'])->name('admin.banners.store');
        Route::get('show/{id}', [BannerController::class, 'show'])->name('admin.banners.show');
        Route::get('{id}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
        Route::put('{id}/update', [BannerController::class, 'update'])->name('admin.banners.update');
        Route::get('{id}/destroy', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
        Route::delete('delete-selected', [BannerController::class, 'deleteSelected'])->name('admin.banners.delete-selected');
    });

    Route::prefix('thong_kes')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.banners.index');
        Route::get('kho_hang', [ThongKeController::class, 'kho_hang'])->name('admin.thong_kes.kho_hang');
        Route::post('store', [ThongKeController::class, 'store'])->name('admin.thong_kes.store');
        Route::get('show/{id}', [ThongKeController::class, 'show'])->name('admin.thong_kes.show');
        Route::get('{id}/edit', [ThongKeController::class, 'edit'])->name('admin.thong_kes.edit');
        Route::put('{id}/update', [ThongKeController::class, 'update'])->name('admin.thong_kes.update');
        Route::get('{id}/destroy', [ThongKeController::class, 'destroy'])->name('admin.thong_kes.destroy');
        Route::delete('delete-selected', [ThongKeController::class, 'deleteSelected'])->name('admin.thong_kes.delete-selected');
    });
    

    // Route::resource('khuyen_mais', KhuyenMaiController::class);




});


// web.php (hoặc api.php nếu là API)



