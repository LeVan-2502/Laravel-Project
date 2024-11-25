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
        Schema::create('san_pham_don_hangs', function (Blueprint $table) {
            $table->id(); // Tạo trường id tự động tăng
            $table->unsignedBigInteger('san_pham_id'); // Khóa ngoại liên kết với bảng san_phams
            $table->unsignedBigInteger('don_hang_id'); // Khóa ngoại liên kết với bảng don_hangs
            $table->integer('so_luong'); // Số lượng sản phẩm
            $table->decimal('gia', 10, 2); // Giá của sản phẩm
            $table->timestamps(); // Các trường created_at và updated_at

            // Định nghĩa khóa ngoại
            $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade');
            $table->foreign('don_hang_id')->references('id')->on('don_hangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_don_hangs');
    }
};
