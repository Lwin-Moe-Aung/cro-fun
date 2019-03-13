<?php

namespace App\Http\Middleware;

use Closure;

class Project
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
        //return $next($request);
        if(session('token')) {
            if(session('current')['role']=="field-officer") {

                return $next($request);
            }

        }

        return redirect('forbidden');
    }
}
