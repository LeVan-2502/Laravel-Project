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
        Schema::create('san_pham_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('san_pham_id')->constrained('san_phams')->onDelete('cascade'); 
            $table->string('hinh_anh', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_galleries');
    }
    
};
