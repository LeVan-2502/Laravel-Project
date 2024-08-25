<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // If login successful, check the user's role
            $user = Auth::user();
            if ($user->vai_tro_id == 2) {
                // Redirect or perform action for users with vai_tro_id = 2
                return redirect()->route('admin');
            } else {
                // Authentication failed
                return back()->withErrors([
                    'message' => 'Thông tin đăng nhập không hợp lệ.',
                    'type' => 'danger'
                ]);
            }
        } else {
            // Authentication failed
            return back()->withErrors([
                'message' => 'Thông tin đăng nhập không hợp lệ.',
                'type' => 'danger'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
