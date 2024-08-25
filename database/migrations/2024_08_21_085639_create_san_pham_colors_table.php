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
        Schema::create('san_pham_colors', function (Blueprint $table) {
            $table->id();
            $table->string('ten_mau_sac', 255); // Tên màu sắc của sản phẩm
            $table->string('ma_mau', 7); // Mã màu sắc (ví dụ: #FFFFFF)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_colors');
    }
};
