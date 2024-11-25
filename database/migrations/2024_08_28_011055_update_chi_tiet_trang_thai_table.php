<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('chi_tiet_trang_thais', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cột 'tai_khoan_id' thành nullable
            $table->unsignedBigInteger('tai_khoan_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('chi_tiet_trang_thais', function (Blueprint $table) {
            // Hoàn nguyên kiểu dữ liệu cột về trạng thái không nullable nếu cần
            $table->unsignedBigInteger('tai_khoan_id')->nullable(false)->change();
        });
    }
    
};
