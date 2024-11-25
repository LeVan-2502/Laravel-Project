<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';

    protected $fillable = [
        'chuong_trinh_banner_id','tieu_de', 'hinh_anh', 'thu_tu',
    ];

    public function chuongTrinhBanners()
    {
        return $this->belongsTo(ChuongTrinhBanner::class, 'chuong_trinh_id');
    }
}
