<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiKhuyenMai extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten',        // Tên loại khuyến mãi
        'mo_ta',      // Mô tả loại khuyến mãi
    ];
}
