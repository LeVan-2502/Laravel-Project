<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanChuyen extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_van_chuyen',
        'ma_van_chuyen',
        'don_hang_id',
        'trang_thai_van_chuyen',
        'ngay_van_chuyen',
    ];
}
