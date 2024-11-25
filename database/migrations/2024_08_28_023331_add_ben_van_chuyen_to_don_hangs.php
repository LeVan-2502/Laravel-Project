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
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->unsignedBigInteger('ben_van_chuyen')->nullable()->after('ghi_chu'); // Thay 'khuyen_mai_id' bằng tên cột hiện tại mà bạn muốn đặt cột mới sau nó.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->dropColumn('ben_van_chuyen');
        });
    }
};
