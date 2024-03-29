<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkUser
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
        if($request->session()->has('email')){
            return $next($request);
        }
        else{
            return redirect('/')->withErrors([
                'email' => "Veuillez vous connecter d'abord.",
            ]);
        }

    }
}
