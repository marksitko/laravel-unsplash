<?php

namespace MarkSitko\LaravelUnsplash\API;

use MarkSitko\LaravelUnsplash\Endpoints\Stats;
use MarkSitko\LaravelUnsplash\Endpoints\Users;
use MarkSitko\LaravelUnsplash\Endpoints\Photos;
use MarkSitko\LaravelUnsplash\Endpoints\Search;
use MarkSitko\LaravelUnsplash\Queries\QueryBuilder;
use MarkSitko\LaravelUnsplash\Endpoints\Collections;

trait UnsplashAPI
{
    use QueryBuilder,
        Users,
        Photos,
        Search,
        Collections,
        Stats;

    /**
     * Associative array with the HTTP verb
     * and the endpoint
     *
     * @var array
     */
    public $apiCall;
}
