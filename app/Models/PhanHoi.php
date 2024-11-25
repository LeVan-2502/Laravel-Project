<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoi extends Model
{
    use HasFactory;
    protected $fillable = [
        'binh_luan_id',
        'tai_khoan_id',
        'noi_dung',
        'trang_thai',
    ];
    public function binhLuan()
    {
        return $this->belongsTo(BinhLuan::class, 'binh_luan_id');
    }
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
}
