<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            // Nếu không đăng nhập, chuyển hướng đến trang đăng nhập admin
            return redirect()->route('admin.login');
        }

        // Kiểm tra vai trò của người dùng
        if (Auth::user()->vai_tro_id !== '1') {
            // Nếu không phải là admin, từ chối truy cập
            abort(403, 'Bạn không có quyền truy cập vào trang này!');
        }

        // Nếu tất cả đều hợp lệ, cho phép tiếp tục
        return $next($request);
    }
}
