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
        Schema::create('phan_ungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tai_khoan_id')->constrained('tai_khoans')->onDelete('cascade');
            $table->foreignId('binh_luan_id')->nullable()->constrained('binh_luans')->onDelete('cascade');
            $table->foreignId('phan_hoi_id')->nullable()->constrained('phan_hois')->onDelete('cascade');
            $table->enum('type', ['like', 'dislike']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_ungs');
    }
};
