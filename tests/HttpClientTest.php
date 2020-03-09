<?php

namespace MarkSitko\LaravelUnsplash\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use MarkSitko\LaravelUnsplash\Http\HttpClient;
use MarkSitko\LaravelUnsplash\UnsplashServiceProvider;

class HttpClientTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [UnsplashServiceProvider::class];
    }

    /** @test */
    public function it_must_provide_an_api_access_key()
    {
        Config::set('unsplash.access_key', 'ABCD1234');

        $httpClient = new HttpClient;

        $this->assertNotFalse(get_class($httpClient));

        Config::set('unsplash.access_key', null);

        $this->expectException("Exception");
        $this->expectExceptionMessage("A Unsplash-API access key must be provided");

        $httpClient = new HttpClient;
    }

    /** @test */
    public function it_provides_the_api_url_as_constants()
    {
        $this->assertEquals(HttpClient::API_URL, 'https://api.unsplash.com/');
    }
}
