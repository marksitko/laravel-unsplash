<?php

namespace MarkSitko\LaravelUnsplash\Endpoints;

trait Users
{
    /**
     * Get a user’s public profile
     * Retrieve public details on a given user.
     * @link https://unsplash.com/documentation#get-a-users-public-profile
     *
     * @param string $username The user’s username. Required.
     * @return MarkSitko\LaravelUnsplash\Endpoints\Users
     */
    public function user( $username )
    {
        $this->apiCall = [
            'endpoint' => "users/{$username}",
        ];
        return $this;
    }

    /**
     * Get a user’s portfolio link
     * Retrieve a single user’s portfolio link.
     * @link https://unsplash.com/documentation#get-a-users-portfolio-link
     *
     * @param string $username The user’s username. Required.
     * @return MarkSitko\LaravelUnsplash\Endpoints\Users
     */
    public function userPortfolio( $username )
    {
        $this->apiCall = [
            'endpoint' => "users/{$username}/portfolio",
        ];
        return $this;
    }

    /**
     * List a user’s photos
     * Get a list of photos uploaded by a user.
     * @link https://unsplash.com/documentation#list-a-users-photos
     *
     * @param string $username The user’s username. Required.
     * @return MarkSitko\LaravelUnsplash\Endpoints\Users
     */
    public function userPhotos( $username )
    {
        $this->apiCall = [
            'endpoint' => "users/{$username}/photos",
        ];
        return $this;
    }

    /**
     * List a user’s liked photos
     * Get a list of photos liked by a user.
     * @link https://unsplash.com/documentation#list-a-users-liked-photos
     *
     * @param string $username The user’s username. Required.
     * @return MarkSitko\LaravelUnsplash\Endpoints\Users
     */
    public function userLikes( $username )
    {
        $this->apiCall = [
            'endpoint' => "users/{$username}/likes",
        ];
        return $this;
    }

    /**
     * List a user’s collections
     * Get a list of collections created by the user.
     * @link https://unsplash.com/documentation#list-a-users-collections
     *
     * @param string $username The user’s username. Required.
     * @return MarkSitko\LaravelUnsplash\Endpoints\Users
     */
    public function userCollections( $username )
    {
        $this->apiCall = [
            'endpoint' => "users/{$username}/collections",
        ];
        return $this;
    }

    /**
     * Get a user’s statistics
     * Retrieve the consolidated number of downloads, views and likes of all user’s photos,
     * as well as the historical breakdown and average of these stats in a specific timeframe (default is 30 days).
     * @link https://unsplash.com/documentation#get-a-users-statistics
     *
     * @param string $username The user’s username. Required.
     * @return MarkSitko\LaravelUnsplash\Endpoints\Users
     */
    public function userStatistics( $username )
    {
        $this->apiCall = [
            'endpoint' => "users/{$username}/statistics",
        ];
        return $this;
    }

}
