<?php

namespace Facades\JsonStringfy\JsonStringfy\Activewor;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JsonStringfy\JsonStringfy\Activewor\BS
 */
class BS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'JsonStringfy\JsonStringfy\Activewor\BS';
    }
}
