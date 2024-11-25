<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanUng extends Model
{
    use HasFactory;
    protected $fillable = [
        'tai_khoan_id',
        'binh_luan_id',
        'phan_hoi_id',
        'type',
    ];
}
