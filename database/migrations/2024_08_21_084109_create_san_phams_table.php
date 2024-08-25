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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id(); // Tạo cột `id` tự động tăng
            $table->string('ten_san_pham', 255); // Tên sản phẩm
            $table->string('slug', 255)->unique(); // Đường dẫn thân thiện với SEO
            $table->text('mo_ta')->nullable(); // Mô tả chi tiết sản phẩm
            $table->decimal('gia', 10, 2); // Giá cơ bản của sản phẩm
            $table->decimal('gia_khuyen_mai', 10, 2)->nullable(); // Giá khuyến mãi (nếu có)
            $table->integer('so_luong_ton')->default(0); // Số lượng tồn kho
            $table->integer('trang_thai')->default('1'); // Trạng thái sản phẩm
            $table->string('thuong_hieu', 50)->nullable(); // Thương hiệu của sản phẩm
            $table->foreignId('danh_muc_id')->constrained('danh_mucs')->onDelete('cascade'); // ID của danh mục sản phẩm
            $table->string('hinh_anh', 255)->nullable(); // Đường dẫn hình ảnh chính của sản phẩm
            $table->decimal('xep_hang_tb', 3, 2)->default(0);
            $table->integer('luot_xem')->default(0); // Lượt xem sản phẩm
            $table->text('mo_ta_ngan')->nullable(); // Đoạn mô tả ngắn gọn để xem trước
            

            // Tạo timestamps để theo dõi created_at và updated_at

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
