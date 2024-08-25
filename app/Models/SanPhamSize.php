<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamSize extends Model
{
    use HasFactory;
    protected $fillable=[
        'ten_size',
        
    ];
    public function sanPhamBienThes(){
        return $this->hasMany(SanPhamBienThe::class);
}

}
