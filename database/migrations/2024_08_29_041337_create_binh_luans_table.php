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
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tai_khoan_id')->constrained('tai_khoans')->onDelete('cascade');
            $table->foreignId('san_pham_id')->constrained('san_phams')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('binh_luans')->onDelete('cascade'); // ID của bình luận cha
            $table->text('noi_dung');
            $table->integer('danh_gia')->nullable(); // Cột lưu đánh giá (ví dụ: 1-5 sao)
            $table->enum('trang_thai', ['active', 'inactive', 'deleted'])->default('active');
            $table->boolean('is_edited')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
