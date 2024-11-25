<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $fillable = [
            'tai_khoan_id',
            'san_pham_id',
            'parent_id',
            'noi_dung',
            'danh_gia',
            'trang_thai',
            'is_edited',
        ];

        public function phanHois()
        {
            return $this->hasMany(PhanHoi::class);
        }
        public function binhLuans()
        {
            return $this->hasMany(BinhLuan::class, 'parent_id');
        }
        public function binhLuan()
        {
            return $this->belongTo(BinhLuan::class, 'parent_id');
        }
    
        public function taiKhoan()
        {
            return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
        }
        public function sanPham()
        {
            return $this->belongsTo(SanPham::class, 'san_pham_id');
        }
}
