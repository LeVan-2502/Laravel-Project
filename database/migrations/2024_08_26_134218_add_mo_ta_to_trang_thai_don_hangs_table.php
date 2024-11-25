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
        Schema::table('trang_thai_don_hangs', function (Blueprint $table) {
            $table->string('mo_ta')->nullable()->after('ma_trang_thai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trang_thai_don_hangs', function (Blueprint $table) {
            //
        });
    }
};
