<?php

namespace MarkSitko\LaravelUnsplash\Tests;

use Mockery;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use MarkSitko\LaravelUnsplash\Unsplash;
use MarkSitko\LaravelUnsplash\UnsplashServiceProvider;

class UnsplashTest extends TestCase
{

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('unsplash.access_key', 'ABCD1234');
    }

    protected function getPackageProviders($app)
    {
        return [UnsplashServiceProvider::class];
    }

    /** @test */
    public function it_provides_photo_access_keys_as_constants()
    {
        $this->assertEquals(
            Unsplash::PHOTO_KEYS,
            [
                'raw',
                'full',
                'regular',
                'small',
                'thumb',
            ]);
    }

}
