<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    
    public function showResetForm(Request $request, $token = null)
    {
        return view('client.auth.partials.reset')->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
{
    // Kiểm tra các điều kiện đầu vào
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'token' => 'required',
    ]);

    // Sử dụng broker 'tai_khoans' nếu bạn cấu hình sử dụng 'tai_khoans'
    $response = Password::broker('tai_khoans')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        }
    );

    // Kiểm tra phản hồi từ Password broker
    if ($response == Password::PASSWORD_RESET) {
        return redirect()->route('client.login')->with('success', __('Mật khẩu đã được đặt lại thành công!'));
    } else {
        return back()->withErrors(['email' => __($response)]);
    }
}

}
