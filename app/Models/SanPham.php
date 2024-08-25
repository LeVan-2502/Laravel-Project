<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $fillable=[
       'ten_san_pham',
        'slug',
        'mo_ta',
        'gia',
        'gia_khuyen_mai',
        'so_luong_ton',
        'trang_thai',
        'thuong_hieu',
        'danh_muc_id',
        'hinh_anh',
        'xep_hang_tb',
        'luot_xem',
        'mo_ta_ngan',
      
    ];
    public function danhMuc(){
            return $this->belongsTo(DanhMuc::class);
    }
    public function sanPhamGalleries(){
            return $this->hasMany(SanPhamGallery::class);
    }
    public function sanPhamBienThes(){
            return $this->hasMany(SanPhamBienThe::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'san_pham_tags', 'san_pham_id', 'tag_id');
    }

    
}
