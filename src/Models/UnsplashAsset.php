<?php

namespace MarkSitko\LaravelUnsplash\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use MarkSitko\LaravelUnsplash\Unsplash;

class UnsplashAsset extends Model
{
    protected $fillable = [
        'unsplash_id',
        'name',
        'author',
        'author_link',
    ];

    /**
     * The booting method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();

        // cleanup while deleting an asset
        static::deleting(function (self $unsplashAsset) {
            if (Storage::disk(config('unsplash.disk', 'local'))->exists("{$unsplashAsset->name}")) {
                Storage::disk(config('unsplash.disk', 'local'))->delete("{$unsplashAsset->name}");
            }

            DB::delete('delete from unsplashables where unsplash_asset_id = ?', [$unsplashAsset->id]);
        });
    }

    /**
     * Get all unsplashables by given model.
     */
    public function assets(Model $model): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany($model, 'unsplashables');
    }

    /**
     * Creates a new instance of the unsplash api client.
     */
    public static function api(): Unsplash
    {
        return new Unsplash();
    }

    /**
     * Returns a complete copyright link for a given data set.
     */
    public function getFullCopyrightLink(): string
    {
        return "Photo by <a target='_blank' href='{$this->author_link}'>{$this->author}</a> on <a target='_blank' href='https://unsplash.com/'>Unsplash</a>";
    }
}
