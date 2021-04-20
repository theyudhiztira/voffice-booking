<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientChecker
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
        return \Auth::guard('client')->user() ? $next($request) : redirect(route('web.login')) ;
    }
}
