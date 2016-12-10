<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KeuanganAuth
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
        $authorize = ['superadmin','keuangan'];
        if (!in_array(Auth::user()->group,$authorize)) {
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
