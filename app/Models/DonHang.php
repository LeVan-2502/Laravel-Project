<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_don_hang',
        'tai_khoan_id',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'sdt_nguoi_nhan',
        'dia_chi_nguoi_nhan',
        'ngay_dat',
        'thanh_toan',
        'ghi_chu',
        'van_chuyen_id',
        'khuyen_mai_id',
        'phuong_thuc_id',
        'trang_thai_don_hang_id',
        'trang_thai_thanh_toan_id'
    ];
    public function taiKhoan(){
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
    public function khuyenMai(){
        return $this->belongsTo(KhuyenMai::class);
    }
    public function vanChuyen(){
        return $this->belongsTo(VanChuyen::class, 'van_chuyen_id');
    }
    public function trangThaiDonHang(){
        return $this->belongsTo(TrangThaiDonHang::class, 'trang_thai_don_hang_id');
    }
    public function trangThaiThanhToan(){
        return $this->belongsTo(TrangThaiThanhToan::class, 'trang_thai_thanh_toan_id');
    }
    public function phuongThucThanhToan(){
        return $this->belongsTo(PhuongThucThanhToan::class, 'phuong_thuc_id');
    }
    
    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'don_hang_id');
    }
    public function vanChuyens()
    {
        return $this->belongsToMany(VanChuyen::class, 'chi_tiet_van_chuyens', 'don_hang_id', 'van_chuyen_id')
                    ->withPivot('trang_thai') // Nếu bạn muốn truy cập cột 'trang_thai' trong bảng trung gian
                    ->withTimestamps(); // Nếu bảng trung gian có timestamps
    }
    public function trangThaiDonHangs()
    {
        return $this->belongsToMany(TrangThaiDonHang::class, 'chi_tiet_trang_thais', 'don_hang_id', 'trang_thai_id')
                    ->withPivot(['thoi_gian','ghi_chu']) // Nếu bạn muốn truy cập cột 'trang_thai' trong bảng trung gian
                    ->withTimestamps(); // Nếu bảng trung gian có timestamps
    }
    public function trangThaiThanhToans()
    {
        return $this->belongsToMany(TrangThaiThanhToan::class, 'chi_tiet_trang_thais', 'don_hang_id', 'trang_thai_id')
                    ->withPivot(['thoi_gian','ghi_chu']) // Nếu bạn muốn truy cập cột 'trang_thai' trong bảng trung gian
                    ->withTimestamps(); // Nếu bảng trung gian có timestamps
    }

}
