<?php

namespace MarkSitko\LaravelUnsplash;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MarkSitko\LaravelUnsplash\Unsplash
 */
class UnsplashFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'unsplash';
    }
}
