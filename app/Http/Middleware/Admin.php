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
        if(Auth::check()){
            if(checkRole(auth()->user()->id, 'admin') ||  checkRole(auth()->user()->id, 'accountant')){
            return $next($request);
        }else{
            return redirect(route('adminLogin'));
         }
        }
         
        return redirect(route('adminLogin'));
    }

}
