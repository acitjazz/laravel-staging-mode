<?php

namespace Acitjazz\LaravelStagingMode\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelStagingMode extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravelstagingmode';
    }
}
