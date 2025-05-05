<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!($request->input('username') == 'tedc' && $request->input('password') == 'rahasia')) {
            return "Anda tidak diijinkan untuk mengakses data nilai, karena username dan password anda salah.";
        }
        return $next($request);
    }
}
