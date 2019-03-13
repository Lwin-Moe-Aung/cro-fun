<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 11/20/2017
 * Time: 10:20 AM
 */

namespace App\Http\Middleware;
use Closure;

class Lender
{
    public function handle($request, Closure $next)
    {

        if (session('token')) {
            if (session('current')['role'] == "lender") {
                //return view('borrower_register');
                return $next($request);
            }

        }
        return redirect('forbidden');
    }
}