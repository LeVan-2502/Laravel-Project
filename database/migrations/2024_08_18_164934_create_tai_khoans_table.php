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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('ten_tai_khoan'); // Tên người dùng
            $table->string('email')->unique(); // Email người dùng, phải duy nhất
            $table->string('password'); // Mật khẩu đã mã hóa
            $table->integer('vai_tro_id'); // Phân loại người dùng (1: admin, 2: khách hàng, 3: nhà cung cấp)
            $table->integer('gioi_tinh'); // Giới tính người dùng (1: Nam, 2: Nữ, 3: Khác)
            $table->text('dia_chi')->nullable(); // Địa chỉ người dùng (có thể để trống)
            $table->string('so_dien_thoai')->nullable(); // Số điện thoại người dùng (có thể để trống)
            $table->string('hinh_anh')->default('he_thongs/avatar_default.jpeg'); // Hình ảnh đại diện (đường dẫn mặc định nếu không có)
            $table->text('gioi_thieu')->nullable(); // Tiểu sử hoặc thông tin thêm về người dùng (có thể để trống)
            $table->integer('trang_thai')->default(1); // Trạng thái kích hoạt tài khoản (1: Kích hoạt, 2: Ngừng kích hoạt)
            $table->rememberToken(); // Token để hỗ trợ chức năng "Nhớ tôi"
            $table->timestamps(); // Thời gian tạo và cập nhật bản ghi
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
