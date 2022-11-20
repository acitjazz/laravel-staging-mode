<?php

namespace Acitjazz\LaravelStagingMode\Http\Middleware;

use Illuminate\Http\Request;
use Spatie\RobotsMiddleware\RobotsMiddleware;

class DisabledRobotsMiddleware extends RobotsMiddleware
{
    /**
     * @return string|bool
     */
    protected function shouldIndex(Request $request) : string
    {
        if (env('APP_ENV') == 'staging') {
            return 'noindex';
        }
        if ($request->segment(1) == 'backend' || $request->segment(1) == 'staging') {
            return 'noindex';
        }
        return 'all';
    }
}
