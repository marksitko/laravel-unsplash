<?php

namespace MarkSitko\LaravelUnsplash\Endpoints;

trait Search
{
    /**
     * Search photos
     * Get a single page of photo results for a query.
     * @link https://unsplash.com/documentation#search-photos
     *
     * @return MarkSitko\LaravelUnsplash\Endpoints\Search
     */
    public function search()
    {
        $this->apiCall = [
            'endpoint' => 'search/photos',
        ];
        return $this;
    }

    /**
     * Search collections
     * Get a single page of collection results for a query.
     * @link https://unsplash.com/documentation#search-collections
     *
     * @return MarkSitko\LaravelUnsplash\Endpoints\Search
     */
    public function searchCollections()
    {
        $this->apiCall = [
            'endpoint' => 'search/collections',
        ];
        return $this;
    }

    /**
     * Search users
     * Get a single page of user results for a query.
     * @link https://unsplash.com/documentation#search-users
     *
     * @return MarkSitko\LaravelUnsplash\Endpoints\Search
     */
    public function searchUsers()
    {
        $this->apiCall = [
            'endpoint' => 'search/users',
        ];
        return $this;
    }

}
