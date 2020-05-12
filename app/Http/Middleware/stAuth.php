<?php

namespace App\Http\Middleware;

use Closure;

class stAuth
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
        if(!(\Session::has('studentLogin')))
        {
            return redirect('mslogin');
        }
        return $next($request);
    }
}
