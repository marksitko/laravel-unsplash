<?php

namespace MarkSitko\LaravelUnsplash\Traits;

use MarkSitko\LaravelUnsplash\Models\UnsplashAsset;

trait HasUnsplashables
{
    /**
     * The booting method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();

        // detach all unsplash assets from given model
        static::deleting(function ($model) {
            $model->unsplash()->detach();
        });
    }

    /**
     * Model may have multiple unsplash assets.
     */
    public function unsplash(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(UnsplashAsset::class, 'unsplashables');
    }
}
