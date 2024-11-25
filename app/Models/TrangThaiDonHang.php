<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiDonHang extends Model
{
    use HasFactory;
    protected $fillable =[
        'ten_trang_thai',
        'ma_trang_thai'
    ];
    public function donHangs()
    {
        return $this->belongsToMany(DonHang::class, 'chi_tiet_trang_thais', 'trang_thai_id','don_hang_id')
                    ->withPivot(['thoi_gian', 'ghi_chu']) // Nếu bạn muốn truy cập cột 'trang_thai' trong bảng trung gian
                    ->withTimestamps(); // Nếu bảng trung gian có timestamps
    }
}
