<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if ($request->session()->has('nom_admin')) {
        return $next($request);
    }

    return redirect()->route('connexion_ad');
}


    
}

