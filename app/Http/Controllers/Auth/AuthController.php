<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate request input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Call the API login endpoint
        $response = Http::post('http://your-api-url/api/login', [
            'email' => $request->email,
            'password' => $request->password,
            'remember' => $request->has('remember'),
        ]);

        // Handle the response
        if ($response->successful()) {
            $data = $response->json();

            // Logic after successful login
            // Lưu token vào session hoặc cookie nếu cần thiết
            session(['user' => $data['user'], 'token' => $data['token']]);

            return redirect()->route('client.home'); // Redirect to customer dashboard
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
}
