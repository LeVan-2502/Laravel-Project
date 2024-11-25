<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAndRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return redirect()->route('client.login'); // Hoặc bạn có thể sử dụng abort(401, 'Chưa đăng nhập!');
        }

        // Lấy vai trò của người dùng hiện tại
        $userRole = Auth::user()->vai_tro_id;

        // Kiểm tra xem vai trò của người dùng có nằm trong danh sách vai trò được cho phép không
        if (!in_array($userRole, $roles)) {
            abort(403, 'Bạn không có quyền truy cập!'); // Từ chối truy cập nếu không có quyền
        }

        return $next($request); // Nếu tất cả đều hợp lệ, cho phép tiếp tục
    }
}
