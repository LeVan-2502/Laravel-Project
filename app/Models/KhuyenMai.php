<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_khuyen_mai',
        'ten_khuyen_mai',
        'mo_ta',
        'gia_tri',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'tinh_trang'
    ];
    public function donHangs(){
        return $this->hasMany(DonHang::class);
    }
}
