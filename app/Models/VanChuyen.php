<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanChuyen extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_van_chuyen',
        'so_dien_thoai',
        'dia_chi',
    ];
    public function donHangs(){
        return $this->belongsToMany(DonHang::class, 'chi_tiet_van_chuyens', 'van_chuyen_id', 'don_hang_id')
        ->withPivot('trang_thai')
        ->withTimestamps();
    }
}
