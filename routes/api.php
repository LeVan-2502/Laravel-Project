<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChiTietGioHangController;
use App\Http\Controllers\Api\GioHangController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('products', ProductController::class);
Route::get('/products/category/{categoryId}', [ProductController::class, 'getByCategory']);

// Xác thực
// routes/api.php

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');


// middleware('auth:api')

// Giỏ hàng
Route::get('/giohang', [GioHangController::class, 'index']); // Lấy giỏ hàng hiện tại
Route::post('/giohang', [GioHangController::class, 'store']); // Tạo giỏ hàng mới
Route::delete('/giohang/{id}', [GioHangController::class, 'destroy']); // Xóa giỏ hàng

// Chi tiết giỏ hàng
// Lấy chi tiết giỏ hàng

Route::get('/giohang/{gio_hang_id}/chitiet', [ChiTietGioHangController::class, 'index']);
Route::post('/giohang/{gio_hang_id}/store', [ChiTietGioHangController::class, 'store']);
Route::post('/giohang/{gio_hang_id}/update', [ChiTietGioHangController::class, 'update']);

Route::delete('/giohang/{bien_the_id}/destroy/{gio_hang_id}', [ChiTietGioHangController::class, 'destroy']);

Route::get('/giohang/{gio_hang_id}/chitiet', [ChiTietGioHangController::class, 'index']);

