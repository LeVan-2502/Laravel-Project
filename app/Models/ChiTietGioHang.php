<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietGioHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_gio_hangs';

    protected $fillable = [
        'gio_hang_id',
        'san_pham_bien_the_id',
        'so_luong',
    ];

    public function gioHang()
    {
        return $this->belongsTo(GioHang::class, 'gio_hang_id');
    }

    public function sanPhamBienThe()
    {
        return $this->belongsTo(SanPhamBienThe::class, 'san_pham_bien_the_id');
    }
}
