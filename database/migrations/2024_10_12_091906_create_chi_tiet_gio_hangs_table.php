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
        Schema::create('chi_tiet_gio_hangs', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('gio_hang_id')->constrained('gio_hangs')->onDelete('cascade'); // Khóa ngoại tới bảng gio_hang
            $table->foreignId('san_pham_bien_the_id')->constrained('san_pham_bien_thes')->onDelete('cascade'); // Khóa ngoại tới bảng san_pham
            $table->integer('so_luong')->default(1); // Số lượng
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_gio_hangs');
    }
};
