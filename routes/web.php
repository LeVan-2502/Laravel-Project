<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\DonHangController;
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
    return view('welcome');
});
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin');
    Route::get('login', [AuthController::class, 'formLogin'])->name('admin.form-login'); // Trang danh sách
    Route::post('login', [AuthController::class, 'login'])->name('admin.login'); // Trang tạo danh mục mới
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout')->middleware(['auth']); // Lưu danh mục mới


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
        Route::get('filter', [SanPhamController::class, 'filter'])->name('admin.san_phams.filter');
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
        Route::get('filter', [DonHangController::class, 'filter'])->name('admin.don_hangs.filter');
        Route::delete('delete-selected', [DonHangController::class, 'deleteSelected'])->name('admin.don_hangs.delete-selected');
        Route::delete('/destroy-bienthe/{id}', [DonHangController::class, 'destroyBienThe'])->name('admin.don_hangs.destroy-bienthe');
        Route::delete('/destroy-image/{id}', [DonHangController::class, 'destroyImage'])->name('admin.don_hangs.destroy-image');

    });

    
    
});


// web.php (hoặc api.php nếu là API)


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
