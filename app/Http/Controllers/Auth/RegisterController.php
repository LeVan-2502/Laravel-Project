<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('client.auth.partials.register');
    }
    public function register(Request $request)
    {
       
        $validated = $request->validate([
            'ten_tai_khoan' => 'required|string|max:255',
            'email' => 'required|email|unique:tai_khoans,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $response = Http::timeout(30)->post('http://127.0.0.1:8000/api/register', [
            'ten_tai_khoan' => $validated['ten_tai_khoan'],
            'email' => $validated['email'],
            'password' => $validated['password'], 
        ]);
       
        if ($response->status() === 201) {
            $data = $response->json(); 
            Auth::loginUsingId($data['user']['id']); 
            return redirect()->route('verification.notice')->with('message', 'Đăng ký thành công. Vui lòng kiểm tra email để xác minh tài khoản.');
        } else {
           
            $errorData = $response->json(); // Lấy thông tin lỗi từ API
            return back()->withErrors([
                'api_error' => 'Đăng ký thất bại. Vui lòng thử lại.',
                'api_response' => $errorData, // Thêm thông tin phản hồi từ API
            ]);
        }
    }
    
}
