<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkPO
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->statut != 'PO') {
            return redirect('/');
        }
        return $next($request);
    }
}
