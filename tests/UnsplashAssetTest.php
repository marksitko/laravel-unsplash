<?php

namespace MarkSitko\LaravelUnsplash\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use MarkSitko\LaravelUnsplash\Models\UnsplashAsset;
use MarkSitko\LaravelUnsplash\Unsplash;
use MarkSitko\LaravelUnsplash\UnsplashServiceProvider;
use PDOException;

class UnsplashAssetTest extends TestCase
{

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('unsplash.access_key', 'ABCD1234');

        $this->setupDatabase();
    }

    protected function getPackageProviders($app)
    {
        return [UnsplashServiceProvider::class];
    }

    /** @test */
    public function it_has_these_massasignable_values()
    {
        $this->assertCount(0, UnsplashAsset::all());

        UnsplashAsset::create([
            'unsplash_id' => 'abc-def-g12',
            'name' => 'some-image.jpg',
            'author' => 'John Doe',
            'author_link' => 'https://unsplash.com/@john_doe',
        ]);

        $this->assertCount(1, UnsplashAsset::all());
    }

    /** @test */
    public function it_throws_an_pdo_exception_when_a_name_is_used_multiple_times()
    {
        $data = [
            'unsplash_id' => 'abc-def-g12',
            'name' => 'some-image.jpg',
            'author' => 'John Doe',
            'author_link' => 'https://unsplash.com/@john_doe',
        ];

        UnsplashAsset::create($data);

        $this->expectException(PDOException::class);

        UnsplashAsset::create($data);
    }

    /** @test */
    public function it_can_return_the_api_client()
    {
         $this->assertInstanceOf(Unsplash::class, UnsplashAsset::api());
    }

    /** @test */
    public function it_can_return_the_full_copyright_link()
    {
        $asset = UnsplashAsset::create([
            'unsplash_id' => 'abc-def-g12',
            'name' => 'some-image.jpg',
            'author' => 'John Doe',
            'author_link' => 'https://unsplash.com/@john_doe',
        ]);

        $this->assertEquals(
            $asset->getFullCopyrightLink(),
            "Photo by <a target='_blank' href='{$asset->author_link}'>{$asset->author}</a> on <a target='_blank' href='https://unsplash.com/'>Unsplash</a>"
        );
    }

    protected function setupDatabase()
    {
        include_once __DIR__.'/../database/migrations/2020_03_09_000000_create_unsplash_assets_table.php';
        include_once __DIR__.'/../database/migrations/2020_03_09_000000_create_unsplashables_table.php';

        (new \CreateUnsplashAssetsTable())->up();
        (new \CreateUnsplashablesTable())->up();

        return $this;
    }
}
