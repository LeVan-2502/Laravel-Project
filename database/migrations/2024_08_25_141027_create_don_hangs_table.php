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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->unique();
            $table->foreignId('tai_khoan_id')->constrained('tai_khoans')->onDelete('cascade');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan')->nullable();
            $table->string('sdt_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->date('ngay_dat');
            $table->decimal('thanh_toan', 15, 2);
            $table->text('ghi_chu')->nullable();
            $table->foreignId('khuyen_mai_id')->constrained('khuyen_mais')->onDelete('cascade');
            $table->foreignId('phuong_thuc_id')->constrained('phuong_thuc_thanh_toans')->onDelete('cascade');
            $table->foreignId('trang_thai_id')->constrained('trang_thai_don_hangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
