<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('loai_khuyen_mais')->insert([
            ['ten' => 'percentage_discount', 'mo_ta' => 'Giảm giá theo phần trăm'],
            ['ten' => 'fixed_amount_discount', 'mo_ta' => 'Giảm giá theo số tiền cố định'],
            ['ten' => 'buy_x_get_y', 'mo_ta' => 'Mua X tặng Y'],
            ['ten' => 'bundle_discount', 'mo_ta' => 'Khuyến mãi theo combo'],
            ['ten' => 'free_shipping', 'mo_ta' => 'Miễn phí vận chuyển'],
            ['ten' => 'quantity_discount', 'mo_ta' => 'Giảm giá theo số lượng'],
            ['ten' => 'customer_specific_discount', 'mo_ta' => 'Giảm giá cho khách hàng cụ thể'],
            ['ten' => 'time_limited_discount', 'mo_ta' => 'Giảm giá theo thời gian'],
            ['ten' => 'gift_with_purchase', 'mo_ta' => 'Tặng kèm sản phẩm'],
            ['ten' => 'order_wide_discount', 'mo_ta' => 'Giảm giá trên toàn bộ đơn hàng'],
            ['ten' => 'promo_code_discount', 'mo_ta' => 'Giảm giá bằng mã khuyến mãi'],
            ['ten' => 'loyalty_points', 'mo_ta' => 'Tích lũy điểm thưởng'],
            ['ten' => 'random_discount', 'mo_ta' => 'Khuyến mãi ngẫu nhiên'],
            ['ten' => 'seasonal_discount', 'mo_ta' => 'Giảm giá theo mùa'],
        ]);
        
        $data = [
            [
                'ten_khuyen_mai' => 'Khuyến mãi mùa hè',
                'mo_ta' => 'Giảm giá 10% cho tất cả sản phẩm mùa hè.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 200,
                    'categories' => 'summer, seasonal',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 10.00,
                'ngay_bat_dau' => '2024-06-01',
                'ngay_ket_thuc' => '2024-08-31',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi sinh nhật',
                'mo_ta' => 'Giảm giá 20% cho đơn hàng trên 500.000 VNĐ.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 500,
                    'categories' => 'all',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 20.00,
                'ngay_bat_dau' => '2024-07-01',
                'ngay_ket_thuc' => '2024-07-31',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi khai trương',
                'mo_ta' => 'Mua 1 tặng 1 cho các sản phẩm mới ra mắt.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 1,
                    'categories' => 'new',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 0.00,
                'ngay_bat_dau' => '2024-08-01',
                'ngay_ket_thuc' => '2024-08-15',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi cuối năm',
                'mo_ta' => 'Giảm giá 30% cho tất cả sản phẩm.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 0,
                    'categories' => 'all',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 30.00,
                'ngay_bat_dau' => '2024-12-01',
                'ngay_ket_thuc' => '2024-12-31',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi lễ Tết',
                'mo_ta' => 'Giảm giá 15% cho đơn hàng trên 300.000 VNĐ.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 300,
                    'categories' => 'holiday',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 15.00,
                'ngay_bat_dau' => '2024-01-01',
                'ngay_ket_thuc' => '2024-01-15',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi bạn bè',
                'mo_ta' => 'Giảm giá 10% cho mỗi bạn bè giới thiệu.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 0,
                    'categories' => 'all',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 10.00,
                'ngay_bat_dau' => '2024-05-01',
                'ngay_ket_thuc' => '2024-05-31',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi Giáng sinh',
                'mo_ta' => 'Giảm giá 25% cho tất cả sản phẩm.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 0,
                    'categories' => 'christmas',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 25.00,
                'ngay_bat_dau' => '2024-12-01',
                'ngay_ket_thuc' => '2024-12-25',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi thu hút khách hàng mới',
                'mo_ta' => 'Giảm giá 20% cho đơn hàng đầu tiên.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 0,
                    'categories' => 'all',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 20.00,
                'ngay_bat_dau' => '2024-04-01',
                'ngay_ket_thuc' => '2024-04-30',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi tháng 8',
                'mo_ta' => 'Giảm giá 12% cho sản phẩm điện tử.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 100,
                    'categories' => 'electronics',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 12.00,
                'ngay_bat_dau' => '2024-08-01',
                'ngay_ket_thuc' => '2024-08-31',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi ngày lễ Phục Sinh',
                'mo_ta' => 'Mua 2 tặng 1 cho tất cả các sản phẩm trang trí.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 2,
                    'categories' => 'decor',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 0.00,
                'ngay_bat_dau' => '2024-04-01',
                'ngay_ket_thuc' => '2024-04-15',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi ngày Quốc Khánh',
                'mo_ta' => 'Giảm giá 18% cho các sản phẩm mua sắm ngoài trời.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 150,
                    'categories' => 'outdoor',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 18.00,
                'ngay_bat_dau' => '2024-09-01',
                'ngay_ket_thuc' => '2024-09-10',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_khuyen_mai' => 'Khuyến mãi ngày Valentine',
                'mo_ta' => 'Giảm giá 25% cho các sản phẩm quà tặng.',
                'dieu_kien_ap_dung' => json_encode([
                    'min_purchase' => 50,
                    'categories' => 'gifts',
                ]),
                'loai_khuyen_mai_id' => rand(1,10),
                'gia_tri_khuyen_mai' => 25.00,
                'ngay_bat_dau' => '2024-02-01',
                'ngay_ket_thuc' => '2024-02-14',
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $item) {
            DB::table('khuyen_mais')->insert($item);
        }
    }
}
