<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiThanhToan extends Model
{
    use HasFactory;
    protected $fillable =[
        'ten_trang_thai',
        'ma_trang_thai'
    ];
  
}
