<?php

namespace MarkSitko\LaravelUnsplash\Http;

use Exception;
use GuzzleHttp\Client;

class HttpClient
{
    const API_URL = 'https://api.unsplash.com/';

    protected $client;

    private $accessKey;

    /**
    * Creates a new instance of HttpClient
    * @return MarkSitko\LaravelUnsplash\Http\HttpClient
    */
    public function __construct()
    {
        $this->initalizeConfiguration()
            ->createClient();

        return $this;
    }

    /**
     * Initalize and store configuration values in class properties
     * @return MarkSitko\LaravelUnsplash\Http\HttpClient
     */
    private function initalizeConfiguration()
    {
        $this->accessKey = config('unsplash.access_key');

        if ( !$this->accessKey ) {
            throw new Exception('A Unsplash-API access key must be provided');
        }

        return $this;
    }

    /**
     * Instantiate the GuzzleHttp Client
     * @return MarkSitko\LaravelUnsplash\Http\HttpClient
     */
    private function createClient()
    {
        $this->client = new Client([
            'base_uri' => self::API_URL,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => "Client-ID {$this->accessKey}",
            ],
        ]);

        return $this;
    }
}
