<?php

namespace Acitjazz\LaravelStagingMode\Http\Middleware;

use Acitjazz\LaravelStagingMode\LaravelStagingMode;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StagingModeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        $ip = LaravelStagingMode::get_client_ip();
        if (env('APP_ENV') == 'staging') {
            if($request->getPathInfo() == config('laravelstagingmode.login_route')){
                if (Cache::has($ip)) {
                    return redirect(config('laravelstagingmode.login_redirect'));
                }
                return $next($request);
            };
            if (Cache::has($ip)) {
                return $next($request);
            }
            return redirect(config('laravelstagingmode.login_route'));
        }
        return $next($request);

    }
}
