<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has('user') && ($request->path() != 'login' && $request->path() != 'recover'))
            return redirect('login')->with('error', 'Primeiro faça o login!');

        if(session()->has('user') && ($request->path() == 'login' || $request->path() == 'recover'))
            return redirect('home');

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            -> header('Pragma', 'no-cache')
            -> header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
