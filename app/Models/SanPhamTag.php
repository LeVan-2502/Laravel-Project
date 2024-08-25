<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamTag extends Model
{
    protected $table = 'san_pham_tags';
    use HasFactory;
    protected $fillable=[
        'san_pham_id',
        'tag_id'
    ];
    public function sanPham(){
        return $this->belongsTo(SanPham::class);
}
    public function tag(){
        return $this->belongsTo(Tag::class);
}
}
