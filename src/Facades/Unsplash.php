<?php

namespace MarkSitko\LaravelUnsplash\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MarkSitko\LaravelUnsplash\Unsplash
 */
class Unsplash extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \MarkSitko\LaravelUnsplash\Unsplash::class;
    }
}
