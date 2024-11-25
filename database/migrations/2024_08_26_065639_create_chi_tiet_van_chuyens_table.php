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
        Schema::create('chi_tiet_van_chuyens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id');
            $table->unsignedBigInteger('van_chuyen_id');
            $table->enum('trang_thai', ['Đang giao hàng', 'Hoàn thành', 'Hủy bỏ'])->default('Đang giao hàng');

            $table->foreign('don_hang_id')->references('id')->on('don_hangs')->onDelete('cascade');
            $table->foreign('van_chuyen_id')->references('id')->on('van_chuyens')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_van_chuyens');
    }
};
