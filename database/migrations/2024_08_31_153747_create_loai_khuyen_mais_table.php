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
        Schema::create('loai_khuyen_mais', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('ten')->unique(); // Cột lưu tên loại khuyến mãi, không trùng lặp
            $table->text('mo_ta')->nullable(); // Cột lưu mô tả loại khuyến mãi, có thể để trống
            $table->timestamps(); // Cột timestamps: created_at và updated_at

            // Nếu bạn muốn thêm khóa ngoại, bạn có thể thêm vào đây
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai_khuyen_mais');
    }
};
