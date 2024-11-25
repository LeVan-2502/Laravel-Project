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
        Schema::create('chi_tiet_trang_thais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id');
            $table->unsignedBigInteger('trang_thai_id');
            $table->unsignedBigInteger('tai_khoan_id')->nullable(); // Cho phép NULL
            $table->timestamp('thoi_gian'); // Thời gian trạng thái
            $table->text('ghi_chu')->nullable(); // Ghi chú thêm (tuỳ chọn)
            $table->timestamps(); // created_at và updated_at

            // Ràng buộc khoá ngoại
            $table->foreign('don_hang_id')->references('id')->on('don_hangs')->onDelete('cascade');
            $table->foreign('trang_thai_id')->references('id')->on('trang_thai_don_hangs')->onDelete('restrict');
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_trang_thais');
    }
};
