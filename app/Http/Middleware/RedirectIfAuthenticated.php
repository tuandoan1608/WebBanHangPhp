<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    const GUARD_ADMIN = 'web';
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard(self::GUARD_ADMIN)->check()) {
            return redirect('$request');
        }

        return $next($request);
    }
}
