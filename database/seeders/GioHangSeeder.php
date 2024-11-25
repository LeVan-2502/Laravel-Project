<?php

namespace Database\Seeders;

use App\Models\GioHang;
use App\Models\TaiKhoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GioHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taiKhoans = TaiKhoan::all();

        foreach ($taiKhoans as $taiKhoan) {
            // Tạo giỏ hàng cho từng tài khoản
            GioHang::insert([
                'id' => $taiKhoan->id, // Gán tai_khoan_id từ tài khoản
                'tai_khoan_id' => $taiKhoan->id, // Gán tai_khoan_id từ tài khoản
                'created_at' => now(), // Gán tai_khoan_id từ tài khoản
                'updated_at' => now(), // Gphán tai_khoan_id từ tài khoản
            ]);
        }
    }
}
