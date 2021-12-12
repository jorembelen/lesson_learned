<?php

namespace App\Http\Middleware;

use RealRashid\SweetAlert\Facades\Alert;
use Closure;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(auth()->user()->role == 1 || auth()->user()->role == 5) {

        return $next($request);
    }

    Alert::error('Error', 'You are not allowed to access this page');

    return redirect(route('home'));

    }

}
