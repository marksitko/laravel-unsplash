<?php

namespace MarkSitko\LaravelUnsplash\Traits;

use MarkSitko\LaravelUnsplash\Models\UnsplashAsset;

trait HasUnsplashables
{

    /**
     * The booting method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // detach all unsplash assets from given model
        static::deleting(function ($model) {
            $model->unsplash()->detach();
        });
    }

    /**
     * Model may have multiple unsplash assets
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function unsplash()
    {
        return $this->morphToMany(UnsplashAsset::class, 'unsplashables');
    }
}
