<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmailVerificationController extends Controller
{

    public function show()
    {
        return view('client.auth.partials.verify-email');
    }

    public function verify(Request $request)
    {
        
        $id = $request->route('id'); // Lấy id từ route
        $hash = $request->route('hash'); // Lấy hash từ route
        $expires = $request->query('expires');
        $signature = $request->query('signature');


        // Gửi yêu cầu POST tới API xác thực email với các tham số
        $url = 'http://127.0.0.1:8000/api/verify-email/' . $id . '/' . $hash;
        // Gửi yêu cầu POST tới API xác thực email với các tham số
        $response = Http::timeout(30)->get($url);
       
        // Kiểm tra phản hồi từ API
        if ($response->successful()) {
            // Nếu thành công, chuyển hướng tới trang đăng nhập với thông báo thành công
            return redirect()->route('client.login')->with('message', 'Tài khoản của bạn đã được xác thực thành công.');
        } else {
            // Nếu thất bại, hiển thị thông báo lỗi
            return redirect()->route('client.login')->with('error', 'Xác thực thất bại. Vui lòng thử lại.');
        }
    }


    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('client.login');;
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Link xác minh email đã được gửi lại.');
    }
}
