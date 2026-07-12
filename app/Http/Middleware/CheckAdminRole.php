<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem user đã đăng nhập chưa VÀ có role là admin không
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Cho phép đi tiếp vào trong
        }

        // Nếu không phải admin, báo lỗi 403 (Cấm truy cập)
        abort(403, 'Bạn không có đặc quyền truy cập vào khu vực Quản trị viên!');
        
        // Mẹo: Thay vì báo lỗi, bạn cũng có thể đuổi họ về trang chủ:
        // return redirect('/');
    }
}