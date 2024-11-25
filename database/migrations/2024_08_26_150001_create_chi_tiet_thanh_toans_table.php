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
        Schema::create('chi_tiet_thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id'); // Khóa ngoại liên kết với bảng don_hangs
            $table->unsignedBigInteger('trang_thai_thanh_toan_id'); // Khóa ngoại liên kết với bảng phuong_thuc_thanh_toans
            $table->unsignedBigInteger('tai_khoan_id')->nullable(); // Khóa ngoại liên kết với bảng tai_khoans, có thể null
            $table->timestamp('thoi_gian'); // Thời gian thanh toán
            $table->text('ghi_chu')->nullable(); // Ghi chú thêm (tuỳ chọn)
            $table->timestamps(); // created_at và updated_at

            // Ràng buộc khóa ngoại
            $table->foreign('don_hang_id')->references('id')->on('don_hangs')->onDelete('cascade');
            $table->foreign('trang_thai_thanh_toan_id')->references('id')->on('trang_thai_thanh_toans')->onDelete('restrict');
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_thanh_toans');
    }
};
