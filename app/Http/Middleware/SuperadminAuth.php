<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperadminAuth
{
    public function handle($request, Closure $next)
    {
    	$authorize = ['superadmin'];
        if (!in_array(Auth::user()->group,$authorize)) {
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}