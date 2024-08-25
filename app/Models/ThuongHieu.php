<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    use HasFactory;
    protected $fillable=[
        'ten_thuong_hieu',
        'mo_ta'
    ];
    public function thuongHieus(){
        return $this->hasMany(SanPham::class);
    }
}
