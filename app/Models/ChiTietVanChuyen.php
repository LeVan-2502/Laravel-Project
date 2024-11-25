<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietVanChuyen extends Model
{
    use HasFactory;
    protected $fillable =[
        'don_hang_id',
        'van_chuyen_id',
        'trang_thai',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class,'don_hang_id');
    }
    public function vanChuyen()
    {
        return $this->belongsTo(VanChuyen::class,'van_chuyen_id');
    }
}