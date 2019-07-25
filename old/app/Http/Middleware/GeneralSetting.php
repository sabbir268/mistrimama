<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class GeneralSetting {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $applicationVar = \App\GeneralSetting::all();

        $finalArry = array();
        foreach ($applicationVar as $config) {
            $finalArry[$config->veriable_slug] = array(
                'name' => $config->setting_name,
                'value' => $config->setting_value,
                'alt_text' => $config->alt_text,
            );
        }

        session(['generalSetting' => $finalArry]);
        return $next($request);
    }

}
