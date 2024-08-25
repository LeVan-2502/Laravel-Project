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
        Schema::create('thuong_hieus', function (Blueprint $table) {
            $table->id();
            $table->string('ten_thuong_hieu'); // Tên thương hiệu
            $table->text('mo_ta')->nullable(); // Mô tả, có thể rỗng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuong_hieu');
    }
};
