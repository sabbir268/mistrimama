<?php

namespace App\Http\Middleware;

use Closure;

class Esp
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
        if (isset(auth()->user()->roles[0]) && auth()->user()->roles[0]->role == 'esp') {
            return $next($request);
        }
        return redirect('/');
    }
}
