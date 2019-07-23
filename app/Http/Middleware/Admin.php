<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
         if(checkRole(auth()->user()->id, 'admin') ||  checkRole(auth()->user()->id, 'accountant')){
            return $next($request);
        }
        return redirect(route('adminLogin'));
    }

}
