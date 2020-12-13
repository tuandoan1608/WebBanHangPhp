<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class clientAuth
{
    const GUARD_ADMIN = 'userclient';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('userclient')->check()) {
            return $next($request);
        }
    
        return abort(401);
    }
}
