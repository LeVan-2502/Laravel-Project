<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_khuyen_mai',
        'mo_ta',
        'dieu_kien_ap_dung',
        'loai_khuyen_mai_id',
        'gia_tri_khuyen_mai',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai'
    ];
    public function donHangs(){
        return $this->hasMany(DonHang::class);
    }
}
