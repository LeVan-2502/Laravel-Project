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
            $table->string('ten_van_chuyen'); // Tên nhà vận chuyển
            $table->string('so_dien_thoai')->nullable(); // Số điện thoại của nhà vận chuyển
            $table->text('dia_chi')->nullable(); // Địa chỉ của nhà vận chuyển
            $table->timestamps(); // Các trường tạo và cập nhật thời gian
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('van_chuyen');
    }
};
