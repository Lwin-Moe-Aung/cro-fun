<?php

namespace App\Http\Middleware;

use Closure;

class Finance
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
        if(session('token')) {
            if(session('current')['role']=="finance" || session('current')['role']=="admin") {

                return $next($request);
            }

        }

        return redirect('forbidden');
    }
}
