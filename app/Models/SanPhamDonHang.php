<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamDonHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'san_pham_id',
        'don_hang_id',
        'so_luong',
        'gia',
    ];
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function donHang()
    {
        return $this->belongsTo(DonHang::class);
    }
}
