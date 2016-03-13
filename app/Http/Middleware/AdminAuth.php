<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminAuth
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
        if (!Session::has('adminid')) {
            return redirect('admin/login');
        }

        return $next($request);
    }
}
