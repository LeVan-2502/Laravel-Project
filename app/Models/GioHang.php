<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'gio_hangs';

    protected $fillable = [
        'tai_khoan_id',
    ];

    public function chiTietGioHang()
    {
        return $this->hasMany(ChiTietGioHang::class, 'gio_hang_id');
    }
}
