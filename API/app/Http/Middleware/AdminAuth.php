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
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest() || !isset(Auth::user()->role)) {
            return redirect('/admin/en/login');
        }
        return $next($request);
    }
}
