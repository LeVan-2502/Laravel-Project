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
        Schema::table('san_pham_bien_thes', function (Blueprint $table) {
            $table->bigInteger('gia')->after('hinh_anh'); // Thay đổi kiểu dữ liệu nếu cần
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_pham_bien_thes', function (Blueprint $table) {
            //
        });
    }
};
