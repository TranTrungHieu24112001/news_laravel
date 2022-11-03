<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Hello
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
        echo "<h1>Middleware Hello dc goi dau tien</h1>";
        return $next($request);
    }
}