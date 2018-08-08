<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Simple
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
        if (!Session::get('role')) {
            return redirect('/');
        }
        else if(Session::get('role') == 'admin'){
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
