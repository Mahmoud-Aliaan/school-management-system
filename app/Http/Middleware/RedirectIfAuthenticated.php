<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
   
    public function handle(Request $request, Closure $next): Response
    {
       

        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (auth('student')->check()) {
            return redirect(RouteServiceProvider::STUDENT);
        }
        if (auth('teacher')->check()) { 
            return redirect(RouteServiceProvider::TEACHER);
        }
        if (auth('parint')->check()) {
             return redirect(RouteServiceProvider::PARINT);
            
            
        }

        return $next($request);
    }
}
