<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'don_hang_id',
        'bien_the_id',
        'so_luong',
        'gia',
        'tong_tien'
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class,'don_hang_id');
    }
    public function sanPhamBienThes()
    {
        return $this->belongsTo(SanPhamBienThe::class, 'bien_the_id');
    }
    // public function sanPham()
    // {
    //     return $this->hasOneThrough(
    //         SanPham::class,
    //         SanPhamBienThe::class,
    //         'san_pham_id',
    //         'id',
    //         'bien_the_id',
    //         'san_pham_id'   
    //     );
    // }
}
