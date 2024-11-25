<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }



    public function showLoginFormClient()
    {
        return view('client.auth.partials.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $response = Http::post('http://127.0.0.1:8000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $user = $data['user'];
            session()->put('jwt_token', $data['token']);
            session()->put('user', $data['user']);
            $model = TaiKhoan::findOrFail($user['id']);
            if ($user['vai_tro_id'] == 1 || $user['vai_tro_id'] == 2) {
                auth()->login($model);
                return redirect()->route('admin.dashboard');
            } else if ($user['vai_tro_id'] === 3) {
                auth()->login($model);
                return redirect()->route('client.home');
            }
            return back()->withErrors([
                'email' => 'Thông tin đăng nhập không chính xác.',
            ]);
        }
    }



    public function logout()
    {
        $token = session('jwt_token'); // Lấy token từ session
        $user = session('user');
        session()->forget('jwt_token');
        session()->forget('user'); 
        if (!$token) {
            return redirect()->route('client.home')->withErrors(['message' => 'Token không hợp lệ.']);
        }
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/logout');
     
        if ($response->successful()) {
           
            if ($user && $user['vai_tro_id'] === 1) {
                return redirect()->route('admin.login');
            } elseif ($user && $user['vai_tro_id']===3) {
                return redirect()->route('client.home');
            }
            return redirect()->route('client.home');
        }
    }
}
