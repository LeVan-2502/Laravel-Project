<?php

namespace Database\Seeders;

use App\Models\ChiTietDonHang;
use App\Models\ChiTietVanChuyen;
use App\Models\SanPham;
use App\Models\SanPhamColor;
use App\Models\SanPhamGallery;
use App\Models\SanPhamSize;
use App\Models\SanPhamTag;
use App\Models\Tag;
use App\Models\ThuongHieu;
use Carbon\Carbon;
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

        // ======================================================================

        // DB::table('van_chuyens')->insert([
        //     ['ten_van_chuyen' => 'Giao Hàng Nhanh', 'so_dien_thoai' => '0123456789', 'dia_chi' => '123 Đường ABC, Quận 1, TP.HCM'],
        //     ['ten_van_chuyen' => 'J&T Express', 'so_dien_thoai' => '0987654321', 'dia_chi' => '456 Đường DEF, Quận 2, TP.HCM'],
        //     ['ten_van_chuyen' => 'GHN', 'so_dien_thoai' => '0912345678', 'dia_chi' => '789 Đường GHI, Quận 3, TP.HCM'],
        //     ['ten_van_chuyen' => 'Ninja Van', 'so_dien_thoai' => '0923456789', 'dia_chi' => '101 Đường JKL, Quận 4, TP.HCM'],
        //     ['ten_van_chuyen' => 'GrabExpress', 'so_dien_thoai' => '0934567890', 'dia_chi' => '202 Đường MNO, Quận 5, TP.HCM'],
        // ]);


        //  foreach (range(101, 200) as $index) {
        //     $vc =  rand(1,5);
        //     ChiTietVanChuyen::create([
        //         'don_hang_id' => $index,
        //         'van_chuyen_id' =>$vc,
        //         'trang_thai'=> 'Đang giao hàng'
        //     ]);
        //     ChiTietVanChuyen::create([
        //         'don_hang_id' => $index,
        //         'van_chuyen_id' => $vc,
        //         'trang_thai'=> 'Hoàn thành'
        //     ]);
        //     ChiTietVanChuyen::create([
        //         'don_hang_id' => $index,
        //         'van_chuyen_id' => $vc,
        //         'trang_thai'=> 'Hủy bỏ'
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
        // $faker = Faker::create();
        // $batchSize = 1000; // Số lượng bản ghi trong mỗi batch
        // $data = [];

        // $batchSize = 1000; // Kích thước batch để chèn dữ liệu
        // $data = [];

        // for ($i = 0; $i < 100; $i++) { // 100 sản phẩm gốc
        //     for ($j = 1; $j <= 10; $j++) { // 10 màu sắc
        //         for ($k = 1; $k <= 6; $k++) { // 6 kích cỡ
        //             $sku = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 3))
        //                 . '-' . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);

        //             $data[] = [
        //                 'sku' => $sku,
        //                 'san_pham_id' => $i + 1,
        //                 'san_pham_color_id' => $j,
        //                 'san_pham_size_id' => $k,
        //                 'hinh_anh' => 'he_thongs/sp' . rand(1, 51) . '.jpeg',
        //                 'gia' => rand(500,100000)*1000, // Đảm bảo giá không vượt quá giới hạn
        //                 'so_luong' => rand(1, 50),
        //             ];

        //             // Chèn dữ liệu khi đã đạt đủ kích thước batch
        //             if (count($data) >= $batchSize) {
        //                 DB::table('san_pham_bien_thes')->insert($data);
        //                 $data = []; // Xóa mảng dữ liệu sau khi chèn
        //             }
        //         }
        //     }
        // }

        // // Chèn dữ liệu còn lại nếu có
        // if (!empty($data)) {
        //     DB::table('san_pham_bien_thes')->insert($data);
        // }



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
        // KHUYEN MAI =======================================================
        // $khuyenMais = [
        //     [
        //         'ma_khuyen_mai' => 'SUMMER2024',
        //         'ten_khuyen_mai' => 'Summer Sale 2024',
        //         'mo_ta' => 'Giảm giá mùa hè 20% cho tất cả sản phẩm.',
        //         'gia_tri' => 20.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '06', '01'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '08', '31'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'NEWYEAR2024',
        //         'ten_khuyen_mai' => 'New Year Sale 2024',
        //         'mo_ta' => 'Giảm giá 15% nhân dịp năm mới.',
        //         'gia_tri' => 15.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '12', '25'),
        //         'ngay_ket_thuc' => Carbon::create('2025', '01', '05'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'BLACKFRIDAY2024',
        //         'ten_khuyen_mai' => 'Black Friday 2024',
        //         'mo_ta' => 'Giảm giá lên đến 50% trong ngày Black Friday.',
        //         'gia_tri' => 50.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '11', '29'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '11', '29'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'CYBERMONDAY2024',
        //         'ten_khuyen_mai' => 'Cyber Monday 2024',
        //         'mo_ta' => 'Giảm giá đặc biệt vào ngày Cyber Monday.',
        //         'gia_tri' => 30.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '12', '02'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '12', '02'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'SPRING2024',
        //         'ten_khuyen_mai' => 'Spring Sale 2024',
        //         'mo_ta' => 'Giảm giá 25% cho sản phẩm xuân.',
        //         'gia_tri' => 25.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '03', '01'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '03', '31'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'VALENTINE2024',
        //         'ten_khuyen_mai' => 'Valentine\'s Day 2024',
        //         'mo_ta' => 'Khuyến mãi đặc biệt nhân dịp Valentine\'s Day.',
        //         'gia_tri' => 10.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '02', '14'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '02', '14'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'MIDYEAR2024',
        //         'ten_khuyen_mai' => 'Mid Year Sale 2024',
        //         'mo_ta' => 'Giảm giá giữa năm 30%.',
        //         'gia_tri' => 30.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '07', '01'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '07', '15'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'BACKTOSCHOOL2024',
        //         'ten_khuyen_mai' => 'Back to School 2024',
        //         'mo_ta' => 'Khuyến mãi cho mùa tựu trường 20%.',
        //         'gia_tri' => 20.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '08', '01'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '08', '31'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'WINTER2024',
        //         'ten_khuyen_mai' => 'Winter Sale 2024',
        //         'mo_ta' => 'Giảm giá 15% cho các sản phẩm mùa đông.',
        //         'gia_tri' => 15.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '12', '01'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '12', '31'),
        //         'tinh_trang' => 1,
        //     ],
        //     [
        //         'ma_khuyen_mai' => 'HALLOWEEN2024',
        //         'ten_khuyen_mai' => 'Halloween Sale 2024',
        //         'mo_ta' => 'Giảm giá đặc biệt cho dịp Halloween.',
        //         'gia_tri' => 20.00,
        //         'ngay_bat_dau' => Carbon::create('2024', '10', '31'),
        //         'ngay_ket_thuc' => Carbon::create('2024', '10', '31'),
        //         'tinh_trang' => 1,
        //     ],
        // ];

        // foreach ($khuyenMais as $khuyenMai) {
        //     DB::table('khuyen_mais')->insert([
        //         'ma_khuyen_mai' => $khuyenMai['ma_khuyen_mai'],
        //         'ten_khuyen_mai' => $khuyenMai['ten_khuyen_mai'],
        //         'mo_ta' => $khuyenMai['mo_ta'],
        //         'gia_tri' => $khuyenMai['gia_tri'],
        //         'ngay_bat_dau' => $khuyenMai['ngay_bat_dau'],
        //         'ngay_ket_thuc' => $khuyenMai['ngay_ket_thuc'],
        //         'tinh_trang' => $khuyenMai['tinh_trang'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // =================================================================================================
        // $phuongThucs = [
        //     [
        //         'ten_phuong_thuc' => 'Thanh toán khi nhận hàng',
        //         'mo_ta' => 'Khách hàng thanh toán trực tiếp khi nhận hàng tại địa chỉ đã đăng ký.',
        //     ],
        //     [
        //         'ten_phuong_thuc' => 'Thẻ tín dụng/Thẻ ghi nợ',
        //         'mo_ta' => 'Thanh toán bằng thẻ tín dụng hoặc thẻ ghi nợ Visa, MasterCard, American Express.',
        //     ],
        //     [
        //         'ten_phuong_thuc' => 'Chuyển khoản ngân hàng',
        //         'mo_ta' => 'Khách hàng chuyển khoản trực tiếp vào tài khoản ngân hàng của chúng tôi.',
        //     ],
        //     [
        //         'ten_phuong_thuc' => 'Ví điện tử',
        //         'mo_ta' => 'Thanh toán thông qua các ví điện tử như Momo, ZaloPay, ViettelPay.',
        //     ],
        //     [
        //         'ten_phuong_thuc' => 'PayPal',
        //         'mo_ta' => 'Thanh toán nhanh chóng và an toàn qua tài khoản PayPal.',
        //     ],
        // ];

        // foreach ($phuongThucs as $phuongThuc) {
        //     DB::table('phuong_thuc_thanh_toans')->insert([
        //         'ten_phuong_thuc' => $phuongThuc['ten_phuong_thuc'],
        //         'mo_ta' => $phuongThuc['mo_ta'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // ===============================================================================================
        // $trangThais = [
        //     [
        //         'ten_trang_thai' => 'Chờ xác nhận',
        //         'ma_trang_thai' => 'CHX',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đã xác nhận',
        //         'ma_trang_thai' => 'DXN',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đang đóng gói',
        //         'ma_trang_thai' => 'DDG',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đang vận chuyển',
        //         'ma_trang_thai' => 'DVC',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đã giao hàng',
        //         'ma_trang_thai' => 'DGH',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đã hủy',
        //         'ma_trang_thai' => 'DHY',
        //     ],

        //     [
        //         'ten_trang_thai' => 'Đang hoàn trả',
        //         'ma_trang_thai' => 'DHT',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Hoàn trả thành công',
        //         'ma_trang_thai' => 'HTS',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đơn hàng bị lỗi',
        //         'ma_trang_thai' => 'DHL',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đơn hàng đã hoàn tất',
        //         'ma_trang_thai' => 'DHT',
        //     ],
        // ];

        // foreach ($trangThais as $trangThai) {
        //     DB::table('trang_thai_don_hangs')->insert([
        //         'ten_trang_thai' => $trangThai['ten_trang_thai'],
        //         'ma_trang_thai' => $trangThai['ma_trang_thai'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // ===========================================================================


        // $trangThaiThanhToans = [
        //     [
        //         'ten_trang_thai' => 'Chờ thanh toán',
        //         'ma_trang_thai' => 'CTT',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Thanh toán thành công',
        //         'ma_trang_thai' => 'TTC',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Thanh toán thất bại',
        //         'ma_trang_thai' => 'TTB',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Đã hoàn tiền',
        //         'ma_trang_thai' => 'DHT',
        //     ],
        //     [
        //         'ten_trang_thai' => 'Thanh toán bị hủy',
        //         'ma_trang_thai' => 'TTH',
        //     ],
        // ];

        // foreach ($trangThaiThanhToans as $trangThai) {
        //     DB::table('trang_thai_thanh_toans')->insert([
        //         'ten_trang_thai' => $trangThai['ten_trang_thai'],
        //         'ma_trang_thai' => $trangThai['ma_trang_thai'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // ================================================================================
        // $faker = Faker::create();

        // $data = [];
        // $today = date('Ymd'); 
        // $date = substr($today, 2);// Lấy ngày hiện tại theo định dạng YYYYMMDD
        // // Lấy ngày hiện tại theo định dạng YYYYMMDD
        // $uniqueNumber = $faker->unique()->numberBetween(1, 999); // Số thứ tự ngẫu nhiên
        // for ($i = 0; $i < 100; $i++) {
        //     $data[] = [
        //         'id'=> $i+1,
        //         'ma_don_hang' => 'WDY' . $date . '-' . str_pad($i+1, 3, '0', STR_PAD_LEFT),
        //         'tai_khoan_id' => rand(1, 50), // ID tài khoản
        //         'ten_nguoi_nhan' => $faker->name, // Tên người nhận
        //         'email_nguoi_nhan' => $faker->email, // Email người nhận
        //         'sdt_nguoi_nhan' => $faker->phoneNumber, // Số điện thoại người nhận
        //         'dia_chi_nguoi_nhan' => $faker->address, // Địa chỉ người nhận
        //         'ngay_dat' => $faker->dateTimeBetween('-1 year', 'now'), // Ngày đặt
        //         'thanh_toan' => rand(5000,100000) * 1000, // Số tiền thanh toán
        //         'ghi_chu' => $faker->sentence, // Ghi chú
        //         'khuyen_mai_id' => rand(1, 10), // ID khuyến mãi
        //         'phuong_thuc_id' => rand(1, 5), // ID khuyến mãi
        //         'trang_thai_don_hang_id' => rand(1, 5), // ID khuyến mãi
        //         'trang_thai_thanh_toan_id' => rand(1, 5), // ID khuyến mãi
        //         'created_at' => now(), // Ngày tạo
        //         'updated_at' => now(), // Ngày cập nhật
        //     ];
        // }

        // // Chèn dữ liệu vào bảng don_hangs
        // DB::table('don_hangs')->insert($data);
        // ====================================================================================

        // DB::table('trang_thai_don_hangs')->insert([
        //     ['ten_trang_thai' => 'Đã đặt hàng', 'ma_trang_thai' => 'DĐH', 'created_at' => now(), 'updated_at' => now()],
        //     ['ten_trang_thai' => 'Đang xử lý', 'ma_trang_thai' => 'DXL', 'created_at' => now(), 'updated_at' => now()],
        //     ['ten_trang_thai' => 'Đã đóng gói', 'ma_trang_thai' => 'DDG', 'created_at' => now(), 'updated_at' => now()],
        //     ['ten_trang_thai' => 'Đang vận chuyển', 'ma_trang_thai' => 'DVC', 'created_at' => now(), 'updated_at' => now()],
        //     ['ten_trang_thai' => 'Đã giao hàng', 'ma_trang_thai' => 'DGH', 'created_at' => now(), 'updated_at' => now()],
        // ]);



        // // }

        //  foreach (range(1, 100) as $index) {
        //         $vc =  rand(1,5);
        //         ChiTietVanChuyen::create([
        //             'don_hang_id' => $index,
        //             'van_chuyen_id' =>$vc,
        //             'trang_thai'=> 'Đang giao hàng'
        //         ]);
        //         ChiTietVanChuyen::create([
        //             'don_hang_id' => $index,
        //             'van_chuyen_id' => $vc,
        //             'trang_thai'=> 'Hoàn thành'
        //         ]);
        //         ChiTietVanChuyen::create([
        //             'don_hang_id' => $index,
        //             'van_chuyen_id' => $vc,
        //             'trang_thai'=> 'Hủy bỏ'
        //         ]);

        //     }
       
        // // }===================================================================================
        $faker = Faker::create();
        $dataDonHang = [];
        $dataChiTietTrangThai = [];
        $today = date('Ymd'); 
        $date = substr($today, 2);

        // Chèn dữ liệu vào bảng don_hangs trước
        for ($i = 1; $i <= 100; $i++) {
            $tt[$i]=$trangThaiId = rand(1, 5); // Chọn trạng thái ngẫu nhiên cho đơn hàng
            $pt[$i]=$thanhToan = rand(1,5);
            $dataDonHang[] = [
                'id' => $i,
                'ma_don_hang' => 'WDY' . $date . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tai_khoan_id' => rand(1, 50),
                'ten_nguoi_nhan' => $faker->name,
                'email_nguoi_nhan' => $faker->email,
                'sdt_nguoi_nhan' => $faker->phoneNumber,
                'dia_chi_nguoi_nhan' => $faker->address,
                'ngay_dat' => $faker->dateTimeBetween('-1 year', 'now'),
                'thanh_toan' => rand(5000, 100000) * 1000,
                'ghi_chu' => $faker->sentence(),
                'khuyen_mai_id' => rand(2, 13),
                'phuong_thuc_id' => rand(1, 5),
                'trang_thai_don_hang_id' => $trangThaiId,
                'trang_thai_thanh_toan_id' =>$thanhToan,
                'created_at' => now(),
                'updated_at' => now(),
            ];                     
        }


        DB::table('don_hangs')->insert($dataDonHang);

        // Chèn dữ liệu vào bảng chi_tiet_trang_thais sau khi bảng don_hangs đã có dữ liệu
        for ($i = 1; $i <=100; $i++) {
            for ($j = 1; $j <= $tt[$i]; $j++) {
                $dataChiTietTrangThai[] = [
                    'don_hang_id' => $i,
                    'trang_thai_id' => $j,
                    'tai_khoan_id' => rand(1,20),
                    'thoi_gian' => Carbon::now(),
                    'ghi_chu' => $faker->sentence(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }
        DB::table('chi_tiet_trang_thais')->insert($dataChiTietTrangThai);

        $faker = Faker::create();

        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $soLuong = $faker->numberBetween(1, 10); // Số lượng ngẫu nhiên từ 1 đến 10
            $gia = round($faker->numberBetween(100000, 5000000) / 1000) * 1000; // Giá sản phẩm làm tròn đến nghìn
            $tongTien = $soLuong * $gia; // Tổng tiền = số lượng * giá

            ChiTietDonHang::create([
                'don_hang_id' => $i+1, // ID đơn hàng ngẫu nhiên từ 1 đến 100
                'bien_the_id' => rand(12005,12100), // ID biến thể ngẫu nhiên từ 1 đến 50
                'so_luong' => $soLuong, // Số lượng
                'gia' => $gia, // Giá
                'tong_tien' => $tongTien, // Tổng tiền
                'created_at' => now(), // Ngày tạo
                'updated_at' => now(), // Ngày cập nhật
            ]);
            ChiTietDonHang::create([
                'don_hang_id' => $i+1, // ID đơn hàng ngẫu nhiên từ 1 đến 100
                'bien_the_id' =>rand(12101, 12200), // ID biến thể ngẫu nhiên từ 1 đến 50
                'so_luong' => $soLuong, // Số lượng
                'gia' => $gia, // Giá
                'tong_tien' => $tongTien, // Tổng tiền
                'created_at' => now(), // Ngày tạo
                'updated_at' => now(), // Ngày cập nhật
            ]);
            ChiTietDonHang::create([
                'don_hang_id' => $i+1, // ID đơn hàng ngẫu nhiên từ 1 đến 100
                'bien_the_id' => $faker->numberBetween(12201, 12300), // ID biến thể ngẫu nhiên từ 1 đến 50
                'so_luong' => $soLuong, // Số lượng
                'gia' => $gia, // Giá
                'tong_tien' => $tongTien, // Tổng tiền
                'created_at' => now(), // Ngày tạo
                'updated_at' => now(), // Ngày cập nhật
            ]);
        }
        for ($i = 1; $i <=100; $i++) {
            $k=rand(1,5);
            for ($j = 1; $j <= $k; $j++) {
                $dataChiTietTrangThai[] = [
                    'don_hang_id' => $i,
                    'trang_thai_thanh_toan_id' => $j,
                    'tai_khoan_id' => rand(1,20),
                    'thoi_gian' => Carbon::now(),
                    'ghi_chu' => $faker->sentence(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }
        DB::table('chi_tiet_thanh_toans')->insert($dataChiTietTrangThai);

          foreach (range(1, 100) as $index) {
            $vc =  rand(1,5);
            ChiTietVanChuyen::create([
                'don_hang_id' => $index,
                'van_chuyen_id' =>$vc,
                'trang_thai'=> 'Đang giao hàng'
            ]);
            ChiTietVanChuyen::create([
                'don_hang_id' => $index,
                'van_chuyen_id' => $vc,
                'trang_thai'=> 'Hoàn thành'
            ]);
            ChiTietVanChuyen::create([
                'don_hang_id' => $index,
                'van_chuyen_id' => $vc,
                'trang_thai'=> 'Hủy bỏ'
            ]);

        }


        // $faker = Faker::create();

        // for ($i = 0; $i < 50; $i++) {
        //     DB::table('binh_luans')->insert([
        //         'tai_khoan_id' => $faker->numberBetween(1,25), // Giả định bạn có 10 người dùng
        //         'san_pham_id' => $faker->numberBetween(1, 50),
        //         'parent_id'=>$faker->numberBetween(1),
        //         'noi_dung' => $faker->sentence,
        //         'danh_gia' => $faker->numberBetween(1, 5), // Giả định đánh giá từ 1 đến 5 sao
        //         'trang_thai' => $faker->randomElement(['active', 'inactive', 'deleted']),
        //         'is_edited' => $faker->boolean,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // $faker = Faker::create();

        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('phan_hois')->insert([
        //         'binh_luan_id' => $faker->numberBetween(1, 50), // Giả định bạn có 100 bình luận
        //         'tai_khoan_id' => $faker->numberBetween(1, 50), // Giả định bạn có 50 tài khoản
        //         'noi_dung' => $faker->sentence,
        //         'trang_thai' => $faker->randomElement(['active', 'inactive', 'deleted']),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ])

        // $faker = Faker::create();
        // for ($i = 0; $i < 200; $i++) {
        //     DB::table('phan_ungs')->insert([
        //         'tai_khoan_id' =>rand(1,50),
        //         'binh_luan_id' => rand(1,50),
        //         'phan_hoi_id' => rand(1,100),
        //         'type' => rand(0, 1) ? 'like' : 'dislike',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

        //     // }

        // }
    }
}
