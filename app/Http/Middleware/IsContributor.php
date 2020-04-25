<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsContributor {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (Auth::user() && (Auth::user()->role_id == CONTRIBUTOR_ROLE || Auth::user()->role_id == ADMIN_ROLE)) {
            return $next($request);
        }

        return redirect('/');
    }

}
