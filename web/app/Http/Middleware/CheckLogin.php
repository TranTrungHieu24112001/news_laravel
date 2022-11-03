<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//sử dụng đối tượng auth để kiểm tra đăng nhập
use Auth;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {  
        //kiem tra xme user đã đăng nhập chưa
        //url('login') -> tạo url
        //redirect -> di chuyển đén 1 url
        if(Auth::check() == false)
            return redirect(url('login'));
        return $next($request);
    }
}
