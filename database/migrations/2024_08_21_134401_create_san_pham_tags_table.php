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
        Schema::create('san_pham_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('san_pham_id');
            $table->unsignedBigInteger('tag_id');
        
            $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        
            $table->primary(['san_pham_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_tags');
    }
};
