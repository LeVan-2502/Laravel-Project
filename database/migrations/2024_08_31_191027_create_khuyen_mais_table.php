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
        if (!Schema::hasTable('khuyen_mais')) {
            Schema::create('khuyen_mais', function (Blueprint $table) {
                $table->id();
                $table->string('ten_khuyen_mai');
                $table->text('mo_ta');
                $table->json('dieu_kien_ap_dung'); // Cột lưu trữ điều kiện áp dụng
                $table->unsignedBigInteger('loai_khuyen_mai_id'); // Đổi tên và thay đổi kiểu dữ liệu
                $table->decimal('gia_tri_khuyen_mai', 10, 2);
                $table->date('ngay_bat_dau');
                $table->date('ngay_ket_thuc');
                $table->tinyInteger('trang_thai')->default(1);
                $table->timestamps();

                // Thêm khóa ngoại
                $table->foreign('loai_khuyen_mai_id')
                    ->references('id')
                    ->on('loai_khuyen_mais')
                    ->onDelete('cascade');
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyen_mais');
    }
};
