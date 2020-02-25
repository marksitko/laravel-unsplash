<?php

namespace Marksitko\LaravelUnsplash\Tests;

use Orchestra\Testbench\TestCase;
use Marksitko\LaravelUnsplash\LaravelUnsplashServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelUnsplashServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
