<?php

namespace App\Http\Middleware;

use Closure;

class Borrower
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

        if (session('token')) {
            if (session('current')['role'] == "field-officer") {
                //return view('borrower_register');
                return $next($request);
            }

        }
        return redirect('forbidden');
    }
}
