<?php

namespace MarkSitko\LaravelUnsplash\Endpoints;

trait Photos
{
    /**
     * List photos
     * Get a single page from the list of all photos.
     * @link https://unsplash.com/documentation#list-photos
     */
    public function photos(): self
    {
        $this->apiCall = [
            'endpoint' => 'photos',
        ];

        return $this;
    }

    /**
     * Get a photo
     * Retrieve a single photo.
     * @link https://unsplash.com/documentation#get-a-photo
     *
     * @param string $id
     */
    public function photo($id): self
    {
        $this->apiCall = [
            'endpoint' => "photos/{$id}",
        ];

        return $this;
    }

    /**
     * Get a random photo.
     * @link https://unsplash.com/documentation#get-a-random-photo
     */
    public function randomPhoto(): self
    {
        $this->apiCall = [
            'endpoint' => 'photos/random',
        ];

        return $this;
    }

    /**
     * Get a photo’s statistics.
     * @link https://unsplash.com/documentation#get-a-photos-statistics
     *
     * @param string $id
     */
    public function photosStatistics($id): self
    {
        $this->apiCall = [
            'endpoint' => "photos/{$id}/statistics",
        ];

        return $this;
    }

    /**
     * Track a photo download.
     * @link https://unsplash.com/documentation#track-a-photo-download
     *
     * @param string $id
     */
    public function trackPhotoDownload($id): self
    {
        $this->apiCall = [
            'endpoint' => "photos/{$id}/download",
        ];

        return $this;
    }
}
