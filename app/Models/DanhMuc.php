<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_danh_muc',
        'slug',
        'hinh_anh',
        'trang_thai'
    ];

    public function sanPhams(){
        return $this->hasMany(SanPham::class);
    }
}
