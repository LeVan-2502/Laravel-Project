<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietThanhToan extends Model
{
    use HasFactory;
    protected $fillable = [
        'don_hang_id',
        'trang_thai_thanh_toan',
        'tai_khoan_id',
        'thoi_gian',
        'ghi_chu',
    ];

    
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
    
    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id');
    }
}
