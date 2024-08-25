<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tai_khoan_id', 
        'san_pham_id', 
        'danh_gia',
        'noi_dung', 
        'phan_hoi_id'
    ];

    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }

    public function phanHois()
    {
        return $this->hasMany(BinhLuan::class, 'phan_hoi_id');
    }
}
