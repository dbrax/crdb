<?php

namespace Epmnzava\Crdb;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Epmnzava\Crdb\Skeleton\SkeletonClass
 */
class CrdbFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'crdb';
    }
}
