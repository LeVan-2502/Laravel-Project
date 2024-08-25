<?php

namespace Database\Seeders;

use App\Models\SanPham;
use App\Models\SanPhamColor;
use App\Models\SanPhamGallery;
use App\Models\SanPhamSize;
use App\Models\SanPhamTag;
use App\Models\Tag;
use App\Models\ThuongHieu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SanPhamSeeder extends Seeder
{

    public function run(): void
    {
        // $faker = Faker::create();

        // foreach (range(1, 10) as $index) {
        //     DB::table('danh_mucs')->insert([
        //         'ten_danh_muc' => $faker->word, // Tạo một từ ngẫu nhiên
        //         'slug' => Str::slug($faker->word), // Tạo slug từ từ ngẫu nhiên
        //         'hinh_anh' => 'he_thongs/sp' . rand(1, 10) . '.jpeg', // Tạo tên file ngẫu nhiên
        //     ]);
        // }
        // =======================================================================
        // foreach (['S', 'M', 'L','XL','XXL','XXXL'] as $item) {
        //     SanPhamSize::create([
        //         'ten_size' => $item
        //     ]);
        // }
        // foreach (['#264653', '#2a9d8f', '#e9c46a','#f4a261','#e76f51','#e63946','#f1faee','#000000','#14213d','#02c39a'] as $item) {
        //     SanPhamColor::create([
        //         'ten_mau_sac' => 'Màu số '. $item,
        //         'ma_mau'=>$item
        //     ]);
        // }
        // $thuongHieus = [
        //     'IKEA',
        //     'West Elm',
        //     'Crate & Barrel',
        //     'Pottery Barn',
        //     'Restoration Hardware',
        //     'Wayfair',
        //     'CB2',
        //     'Anthropologie',
        //     'Herman Miller',
        //     'Design Within Reach'
        // ];

        // foreach ($thuongHieus as $thuongHieu) {
        //     DB::table('thuong_hieus')->insert([
        //         'ten_thuong_hieu' => $thuongHieu,
        //     ]);
        // }
        // $tags = [
        //     'Khuyến Mãi',
        //     'Hot',
        //     'Mới',
        //     'Giảm Giá',
        //     'Nổi Bật',
        //     'Có Hạn',
        //     'Bán Chạy',
        //     'Đặc Biệt',
        //     'Xả Kho',
        //     'Top Bán'
        // ];

        // foreach ($tags as $tag) {
        //     DB::table('tags')->insert([
        //         'ten' => $tag,
        //     ]);
        // // }
        // $tags = [
        //     'Admin',
        //     'Nhân viên',
        //     'Khách hàng'
            
        // ];

        // foreach ($tags as $tag) {
        //     DB::table('vai_tros')->insert([
        //         'ten_vai_tro' => $tag,
        //         'mo_ta'=>fake()->text(50)
        //     ]);
        // }



        // foreach (range(1, 100) as $index) {
        //     SanPhamGallery::create([
        //         'san_pham_id' => $index,
        //         'hinh_anh' => 'he_thongs/sp' . rand(1, 13) . '.jpeg',
        //     ]);

        //     SanPhamGallery::create([
        //         'san_pham_id' => $index,
        //         'hinh_anh' => 'he_thongs/sp' . rand(14, 26) . '.jpeg',
        //     ]);

        //     SanPhamGallery::create([
        //         'san_pham_id' => $index,
        //         'hinh_anh' => 'he_thongs/sp' . rand(27, 39) . '.jpeg',
        //     ]);
        //     SanPhamGallery::create([
        //         'san_pham_id' => $index,
        //         'hinh_anh' => 'he_thongs/sp' . rand(40, 51) . '.jpeg',
        //     ]);
        // }
        // =========================================================
        // foreach (range(1, 400) as $index) {
        //         SanPhamTag::create([
        //             'san_pham_id' => $index,
        //             'tag_id' => rand(1, 3)
        //         ]);

        //         SanPhamTag::create([
        //             'san_pham_id' => $index,
        //             'tag_id' => rand(4, 10)
        //         ]);

        //     }
        // -------=======================================================================================
        $faker = Faker::create();
        $batchSize = 1000; // Số lượng bản ghi trong mỗi batch
        $data = [];
        
        $batchSize = 1000; // Kích thước batch để chèn dữ liệu
        $data = [];
        
        for ($i = 0; $i < 100; $i++) { // 100 sản phẩm gốc
            for ($j = 1; $j <= 10; $j++) { // 10 màu sắc
                for ($k = 1; $k <= 6; $k++) { // 6 kích cỡ
                    $sku = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 3))
                        . '-' . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);
            
                    $data[] = [
                        'sku' => $sku,
                        'san_pham_id' => $i + 1,
                        'san_pham_color_id' => $j,
                        'san_pham_size_id' => $k,
                        'hinh_anh' => 'he_thongs/sp' . rand(1, 51) . '.jpeg',
                        'gia' => rand(500,100000)*1000, // Đảm bảo giá không vượt quá giới hạn
                        'so_luong' => rand(1, 50),
                    ];
        
                    // Chèn dữ liệu khi đã đạt đủ kích thước batch
                    if (count($data) >= $batchSize) {
                        DB::table('san_pham_bien_thes')->insert($data);
                        $data = []; // Xóa mảng dữ liệu sau khi chèn
                    }
                }
            }
        }
        
        // Chèn dữ liệu còn lại nếu có
        if (!empty($data)) {
            DB::table('san_pham_bien_thes')->insert($data);
        }
        
        

        // ---------------------------------------------------------------------------------------
            // $faker = Faker::create();
            // $thuongHieus = [
            //     'IKEA',
            //     'West Elm',
            //     'Crate & Barrel',
            //     'Pottery Barn',
            //     'Restoration Hardware',
            //     'Wayfair',
            //     'CB2',
            //     'Anthropologie',
            //     'Herman Miller',
            //     'Design Within Reach'
            // ];
            // $data = [];

            // for ($i = 0; $i < 100; $i++) { // Số lượng sản phẩm muốn tạo
            //     $data[] = [
            //         'id'=>$i+1,
            //         'ten_san_pham' => ucwords($faker->word . ' ' . $faker->word), // Tên sản phẩm
            //         'slug' => $faker->slug, // Slug
            //         'mo_ta' => ucwords($faker->paragraph), // Mô tả
            //         'gia' => round($faker->numberBetween(100000, 100000000) / 1000) * 1000, // Giá làm tròn đến nghìn
            //         'gia_khuyen_mai' => round($faker->numberBetween(500000, 90000000) / 1000) * 1000, // Giá khuyến mại làm tròn đến nghìn
            //         'so_luong_ton' => $faker->numberBetween(1, 100), // Số lượng tồn
            //         'trang_thai' => 1, // Trạng thái
            //         'thuong_hieu' =>$thuongHieus[rand(0,9)], // Thương hiệu
            //         'danh_muc_id' => rand(1, 8), // Danh mục
            //         'hinh_anh' => 'he_thongs/sp' . rand(1, 51) . '.jpeg', // Hình ảnh
            //         'xep_hang_tb' => number_format($faker->randomFloat(2, 1, 5), 2), // Xếp hạng trung bình
            //         'luot_xem' => $faker->numberBetween(0, 10000), // Lượt xem
            //         'mo_ta_ngan' => ucwords($faker->sentence), // Mô tả ngắn

            //     ];
            // }
            // // Chèn dữ liệu vào bảng san_pham
            // DB::table('san_phams')->insert($data);
            // ===================================================================

            // $faker = Faker::create();
            // foreach (range(1, 200) as $index) {
            //     DB::table('tai_khoans')->insert([
            //         'ten_tai_khoan' => $faker->userName,
            //         'email' => $faker->unique()->safeEmail,
            //         'password' => bcrypt('25022001'), // Đặt mật khẩu mặc định
            //         'vai_tro_id' => rand(1, 3), // Giả sử có 5 vai trò
            //         'gioi_tinh' =>rand(1, 2),
            //         'dia_chi' => $faker->address,
            //         'so_dien_thoai' => $faker->phoneNumber,
            //         'hinh_anh' =>'he_thongs/sp'.rand(1,10).'.jpeg',
            //         'gioi_thieu' => $faker->text(100),
            //         'trang_thai' => 1,
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);
            // }
    }
}
