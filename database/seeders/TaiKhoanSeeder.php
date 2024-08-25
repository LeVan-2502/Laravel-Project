<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 200) as $index) {
            DB::table('tai_khoans')->insert([
                'ten_tai_khoan' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('25022001'), // Đặt mật khẩu mặc định
                'vai_tro_id' => rand(1, 3), // Giả sử có 5 vai trò
                'gioi_tinh' =>rand(1, 2),
                'dia_chi' => $faker->address,
                'so_dien_thoai' => $faker->phoneNumber,
                'hinh_anh' =>'he_thongs/sp'.rand(1,10).'.jpeg',
                'gioi_thieu' => $faker->text(100),
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
}
