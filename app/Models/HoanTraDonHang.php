<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoanTraDonHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'don_hang_id',
        'ly_do_hoan_tra',
        'trang_thai',
        'ngay_hoan_tra'
    ];
}
