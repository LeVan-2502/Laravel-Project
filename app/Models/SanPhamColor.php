<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamColor extends Model
{
    use HasFactory;
    protected $fillable=[
        'ten_mau_sac',
        'ma_mau'
    ];
    public function sanPhamBienThe(){
        return $this->hasMany(SanPhamBienThe::class);
    }
}
