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
    Schema::table('chi_tiet_don_hangs', function (Blueprint $table) {
        $table->decimal('tong_tien', 15, 2)->change();
    });
}

public function down()
{
    Schema::table('chi_tiet_don_hangs', function (Blueprint $table) {
        $table->decimal('tong_tien', 8, 2)->change(); // Ví dụ thay về cũ
    });
}
};
