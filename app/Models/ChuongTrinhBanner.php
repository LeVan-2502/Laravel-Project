<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuongTrinhBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten', 'mo_ta', 'ngay_bat_dau', 'ngay_ket_thuc', 'trang_thai','loai'
    ];

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }
}
