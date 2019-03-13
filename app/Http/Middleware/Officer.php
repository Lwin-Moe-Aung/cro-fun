<?php

namespace App\Http\Middleware;

use Closure;
use League\Flysystem\Exception;

class Officer
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
            if(session('current')['role']=="admin" ||session('current')['role']=="finance" ) {
                //return view('fieldofficer_register');
                return $next($request);
            }

        }

        return redirect('forbidden');
    }
}
