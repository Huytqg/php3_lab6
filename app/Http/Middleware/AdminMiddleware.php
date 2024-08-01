<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response  
    {  
        // Kiểm tra xem người dùng đã đăng nhập chưa và có role là 'admin' không  
        if (Auth::check() && Auth::user()->role == 'admin') {  
            return $next($request);     
        } 
        if (Auth::check() && !Auth::user()->active) {
            Auth::logout();
            return redirect()->route('login')->with('errorLogin', 'Tài khoản của bạn chưa được kích hoạt.');
        }

        return redirect()->route('test')->with('errorLogin', 'Tài khoản của bạn không có quyền');  
    }

}
