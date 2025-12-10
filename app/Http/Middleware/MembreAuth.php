<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MembreAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('membre_id')) {
            return redirect()->route('membre.login');
        }

        return $next($request);
    }
}
