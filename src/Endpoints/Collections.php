<?php

namespace MarkSitko\LaravelUnsplash\Endpoints;

trait Collections
{
    /**
     * List collections
     * Get a single page from the list of all collections.
     * @link https://unsplash.com/documentation#list-collections
     */
    public function collectionsList(): self
    {
        $this->apiCall = [
            'endpoint' => 'collections',
        ];

        return $this;
    }

    /**
     * List featured collections
     * Get a single page from the list of featured collections.
     * @link https://unsplash.com/documentation#list-featured-collections
     */
    public function featuredCollection(): self
    {
        $this->apiCall = [
            'endpoint' => 'collections/featured',
        ];

        return $this;
    }

    /**
     * Get a collection
     * Retrieve a single collection. To view a user’s private collections, the read_collections scope is required.
     * @link https://unsplash.com/documentation#get-a-collection
     *
     * @param int|string $id The collections’s ID. Required.
     */
    public function showCollection($id): self
    {
        $this->apiCall = [
            'endpoint' => "collections/{$id}",
        ];

        return $this;
    }

    /**
     * Get a collection’s photos
     * Retrieve a collection’s photos.
     * @link https://unsplash.com/documentation#get-a-collections-photos
     *
     * @param int|string $id The collections’s ID. Required.
     */
    public function showCollectionPhotos($id): self
    {
        $this->apiCall = [
            'endpoint' => "collections/{$id}/photos",
        ];

        return $this;
    }

    /**
     * List a collection’s related collections
     * Retrieve a list of collections related to this one.
     * @link https://unsplash.com/documentation#list-a-collections-related-collections
     *
     * @param int|string $id The collections’s ID. Required.
     */
    public function showCollectionRelatedCollections($id): self
    {
        $this->apiCall = [
            'endpoint' => "collections/{$id}/related",
        ];

        return $this;
    }
}
