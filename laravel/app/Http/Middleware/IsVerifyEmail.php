<?php

  

namespace App\Http\Middleware;

  

use Closure;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

  

class IsVerifyEmail

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

        if (Auth::check() && Auth::user()->is_email_verified) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Please verify your email first.');

   

        return $next($request);

    }

}
