<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_don_hang',
        'tai_khoan_id',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'sdt_nguoi_nhan',
        'dia_chi_nguoi_nhan',
        'ngay_dat',
        'thanh_toan',
        'ghi_chu',
        'khuyen_mai_id',
        'phuong_thuc_id',
        'trang_thai_id'
    ];
}
