<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaiKhoan extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'ten_tai_khoan',
        'email',
        'password',
        'vai_tro_id',
        'gioi_tinh',
        'dia_chi',
        'so_dien_thoai',
        'hinh_anh',
        'gioi_thieu',
        'trang_thai'
    ];

    // Nếu bạn sử dụng bcrypt để mã hóa mật khẩu
    protected $hidden = [
        'password',
    ];
    public function vaiTro(){
        return $this->belongsTo(VaiTro::class);
}
}

