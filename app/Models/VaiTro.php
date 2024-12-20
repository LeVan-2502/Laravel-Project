<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;
    protected $fillable=[
        'ten_vai_tro',
        'mo_ta'
    ];
    public function taiKhoans(){
        return $this->hasMany(TaiKhoan::class);
}
}
