<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): 
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()) {
            return redirect()->route("login")->with("error", "Da biste pristupili stranici morate se ulogovati kao admin!");
        }


        if (Auth::user()->role_id == 1){
            return redirect()->route("not-auth");
        }


        return $next($request);
    }
}
