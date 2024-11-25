<?php

namespace Database\Seeders;

use App\Models\ChiTietGioHang;
use App\Models\TaiKhoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChiTietGioHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taiKhoans = TaiKhoan::all();

        foreach ($taiKhoans as $taiKhoan) {
            // Tạo giỏ hàng cho từng tài khoản
            ChiTietGioHang::create([
                'gio_hang_id' => $taiKhoan->id, // Gán tai_khoan_id từ tài khoản
                'san_pham_bien_the_id' => rand(12050,12100), // Gán tai_khoan_id từ tài khoản
                'so_luong' => rand(1, 5),
            ]);
            ChiTietGioHang::create([
                'gio_hang_id' => $taiKhoan->id, // Gán tai_khoan_id từ tài khoản
                'san_pham_bien_the_id' => rand(12101,12150),// Gán tai_khoan_id từ tài khoản
                'so_luong' => rand(1, 5),
            ]);
            ChiTietGioHang::create([
                'gio_hang_id' => $taiKhoan->id, // Gán tai_khoan_id từ tài khoản
                'san_pham_bien_the_id' => rand(12151,12300), // Gán tai_khoan_id từ tài khoản
                'so_luong' => rand(1, 5),
            ]);
        }
    }
}
