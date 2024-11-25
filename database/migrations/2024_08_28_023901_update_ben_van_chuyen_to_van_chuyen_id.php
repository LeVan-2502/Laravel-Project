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
        Schema::table('don_hangs', function (Blueprint $table) {
            // Đổi tên cột từ 'ben_van_chuyen' thành 'van_chuyen_id'
            $table->renameColumn('ben_van_chuyen', 'van_chuyen_id');
     
            $table->foreign('van_chuyen_id')->references('id')->on('van_chuyens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            //
        });
    }
};
