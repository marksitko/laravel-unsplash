<?php

namespace MarkSitko\LaravelUnsplash\Endpoints;

trait Stats
{
    /**
     * Totals
     * Get a list of counts for all of Unsplash.
     * @link https://unsplash.com/documentation#totals
     *
     * @return MarkSitko\LaravelUnsplash\Endpoints\Stats
     */
    public function totalStats()
    {
        $this->apiCall = [
            'endpoint' => 'stats/total',
        ];
        return $this;
    }

    /**
     * Month
     * Get the overall Unsplash stats for the past 30 days.
     * @link https://unsplash.com/documentation#month
     *
     * @return MarkSitko\LaravelUnsplash\Endpoints\Stats
     */
    public function monthlyStats()
    {
        $this->apiCall = [
            'endpoint' => 'stats/month',
        ];
        return $this;
    }
}
