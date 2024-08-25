<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('van_chuyens', function (Blueprint $table) {
            $table->id();
            $table->string('ten_van_chuyen');  // Tên đơn vị vận chuyển
            $table->string('ma_van_chuyen')->unique();  // Mã vận đơn
            $table->foreignId('don_hang_id')->constrained('don_hangs')->onDelete('cascade');  // Khóa ngoại liên kết với bảng don_hangs
            $table->enum(
                'trang_thai_van_chuyen', 
                [
                    'dang_van_chuyen',   // Đang vận chuyển
                    'da_giao_hang',      // Đã giao hàng
                    'chua_giao',         // Chưa giao
                    'bi_huy',            // Bị hủy
                    'loi_van_chuyen',    // Lỗi vận chuyển
                    'dang_xu_ly',        // Đang xử lý
                    'cho_xac_nhan'      // Chờ xác nhận
                ]
            )->default('dang_van_chuyen');  // Trạng thái vận chuyển với giá trị mặc định
            $table->date('ngay_van_chuyen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('van_chuyens');
    }
};
