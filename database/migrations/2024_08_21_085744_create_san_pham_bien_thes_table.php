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
        Schema::create('san_pham_bien_thes', function (Blueprint $table) {
            $table->id(); // Tạo cột `id` tự động tăng
            $table->string('sku'); // Tạo cột `id` tự động tăng
            $table->foreignId('san_pham_id')->constrained('san_phams')->onDelete('cascade'); // Khóa ngoại liên kết với bảng `san_phams`
            $table->foreignId('san_pham_color_id')->constrained('san_pham_colors')->onDelete('cascade'); // Khóa ngoại liên kết với bảng `san_pham_colors`
            $table->foreignId('san_pham_size_id')->constrained('san_pham_sizes')->onDelete('cascade'); // Khóa ngoại liên kết với bảng `san_pham_sizes`
            $table->string('hinh_anh', 255)->nullable(); // Đường dẫn hình ảnh của biến thể
            $table->float('gia'); // Đường dẫn hình ảnh của biến thể
            $table->integer('so_luong')->default(0); // Số lượng tồn kho của biến thể
            $table->timestamps(); // Tạo cột `created_at` và `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_bien_thes');
    }
};
