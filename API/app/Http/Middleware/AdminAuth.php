<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Redirect to login page if not authorized
     *
     * @param $request
     * @param \Closure $next
     *
     * @return void
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        return redirect('/admin/en/login');
    }
}
