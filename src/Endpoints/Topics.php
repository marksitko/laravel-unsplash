<?php

namespace MarkSitko\LaravelUnsplash\Endpoints;

trait Topics
{
    /**
     * List topics
     * Get a single page from the list of all topics.
     * @link https://unsplash.com/documentation#list-topics
     */
    public function topicsList(): self
    {
        $this->apiCall = [
            'endpoint' => 'topics',
        ];

        return $this;
    }

    /**
     * Get a topic
     * Retrieve a single topic.
     * @link https://unsplash.com/documentation#get-a-topic
     *
     * @param int|string $id The topic’s ID or slug. Required.
     */
    public function showTopic($id): self
    {
        $this->apiCall = [
            'endpoint' => "topics/{$id}",
        ];

        return $this;
    }

    /**
     * Get a topic photos
     * Retrieve a topic’s photos.
     * @link https://unsplash.com/documentation#get-a-topics-photos
     *
     * @param int|string $id The topic’s ID or slug. Required.
     */
    public function showTopicPhotos($id): self
    {
        $this->apiCall = [
            'endpoint' => "topics/{$id}/photos",
        ];

        return $this;
    }
}
