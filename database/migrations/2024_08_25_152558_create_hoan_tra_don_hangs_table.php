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
        Schema::create('hoan_tra_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('don_hang_id')->constrained('don_hangs')->onDelete('cascade');  // Khóa ngoại liên kết với bảng don_hangs
            $table->text('ly_do_hoan_tra');  // Lý do hoàn trả
            $table->enum(
                'trang_thai', 
                [
                    'dang_xu_ly',   // Đang xử lý
                    'da_hoan_tra'   // Đã hoàn trả
                ]
            )->default('dang_xu_ly');  // Trạng thái hoàn trả với giá trị mặc định
            $table->date('ngay_hoan_tra')->nullable();  // Ngày hoàn trả (có thể null)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoan_tra_don_hangs');
    }
};
