<?php

namespace Marksitko\LaravelUnsplash;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marksitko\LaravelUnsplash\Skeleton\SkeletonClass
 */
class LaravelUnsplashFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-unsplash';
    }
}
