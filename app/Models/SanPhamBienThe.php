<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamBienThe extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'san_pham_id',
        'san_pham_color_id',
        'san_pham_size_id',
        'hinh_anh',
        'gia',
        'so_luong',
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function sanPhamColor()
    {
        return $this->belongsTo(SanPhamColor::class);
    }
    public function sanPhamSize()
    {
        return $this->belongsTo(SanPhamSize::class);
    }
}
