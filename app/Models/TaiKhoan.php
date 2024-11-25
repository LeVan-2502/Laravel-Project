<?php

namespace App\Models;

use App\Mail\VerificationEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class TaiKhoan extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable, HasFactory, HasApiTokens;

    protected $fillable = [
        'ten_tai_khoan',
        'email',
        'password',
        'vai_tro_id',
        'gioi_tinh',
        'dia_chi',
        'so_dien_thoai',
        'hinh_anh',
        'gioi_thieu',
        'trang_thai',
    ];

    // Nếu bạn sử dụng bcrypt để mã hóa mật khẩu
    protected $hidden = [
        'password',
    ];

    public function sendVerificationEmail()
    {
        $verificationUrl = url('/email/verify/' . $this->id . '/' . $this->verification_token);
        Mail::to($this->email)->send(new VerificationEmail($verificationUrl));
    }

    public function vaiTro()
    {
        return $this->belongsTo(VaiTro::class);
    }

    public function chiTietTrangThais()
    {
        return $this->hasMany(ChiTietTrangThai::class);
    }

    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Trả về ID của tài khoản
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
