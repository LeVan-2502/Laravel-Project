<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Controller;
use App\Models\GioHang;
use App\Models\TaiKhoan;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $user = TaiKhoan::create([
            'ten_tai_khoan' => $request->ten_tai_khoan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hinh_anh' => 'he_thongs/avatar_default.jpeg',
            'vai_tro_id' => 3,
        ]);

        event(new Registered($user));
        return response()->json([
            'success' => true,
            'message' => 'Tạo mới tài khoàn thành công.',
            'user' => [
                'id' => $user->id,
                'ten_tai_khoan' => $user->ten_tai_khoan,
                'email' => $user->email,
                'vai_tro_id' => $user->vai_tro_id,
            ],
        ], 201);
    }
    public function verifyEmail(Request $request)
    {
        $id = $request->route('id'); // Lấy id từ route
        $hash = $request->route('hash'); // Lấy hash từ route
    
     
        $user = TaiKhoan::where('id', $id)->first();  
        if (!$user) {
            return response()->json([
                'id'=>$id,
                'user'=>$user,
                'message' => 'Tài khoản không tồn tại'
            ], 404);
        }
       
        if (!$user->hasVerifiedEmail()) {
            $cart = GioHang::insert([
                'id'=>$user->id,
                'tai_khoan_id'=> $user->id,
                'created_at'=> now(),
                'updated_at'=> now() 
            ]);
            $user->markEmailAsVerified(); // Laravel sẽ cập nhật email_verified_at
        }
    
        return response()->json([
           
            'success' => true,
            'message' => 'Tài khoản đã được xác thực thành công'
        ]);
    }
    
    
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Thực hiện xác thực với JWT
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'errors' => [
                    'email' => ['Invalid credentials'], // Thông báo lỗi cho email không hợp lệ
                ]
            ], 422);
        }
    
        $user = JWTAuth::user();
        return response()->json([
            'success' => true, // Trả về trường thành công
            'token' => $token,
            'user' => $user,
        ]);
    }
    

    public function logout()
    {
        $user = JWTAuth::user();
    
        JWTAuth::invalidate(JWTAuth::getToken());
    
        return response()->json([
            'success' => true,
            'message' => 'Đã đăng xuất thành công.',
        ]);
    }
    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    // Xác minh email


    // Quên mật khẩu
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Reset link sent']);
        }
        return response()->json([
            'errors' => [
                'email' => ['Unable to send reset link']
            ]
        ], 422);
    }

    // Đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Password reset successfully']);
        }

        return response()->json([
            'errors' => [
                'email' => ['Password reset failed']
            ]
        ], 422);
    }

    // Trả về token
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60  // Lấy TTL từ file config (mặc định là phút, nhân 60 để đổi sang giây)
        ]);
    }
}
