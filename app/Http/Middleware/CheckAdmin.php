<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có email là admin
        if (auth()->check() && auth()->user()->email === 'phu2722002@gmail.com') {
            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng về trang chủ hoặc trang lỗi
        return redirect()->route('login.form');    }
}
