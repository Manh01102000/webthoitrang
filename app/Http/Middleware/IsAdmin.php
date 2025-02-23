<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu admin đã đăng nhập
        if (!session()->has('admin_id')) {
            return redirect('/login')->with('error', 'Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}
