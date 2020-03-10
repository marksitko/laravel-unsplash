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
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // cleanup while deleting an asset
        static::deleting(function (UnsplashAsset $unsplashAsset) {

            if ( Storage::disk( config('unsplash.disk', 'local') )->exists("{$unsplashAsset->name}") ) {
                Storage::disk( config('unsplash.disk', 'local') )->delete("{$unsplashAsset->name}");
            }

            DB::delete('delete from unsplashables where unsplash_asset_id = ?', [$unsplashAsset->id]);

        });
    }

    /**
     * Get all unsplashables by given model
     * @param $model Illuminate\Database\Eloquent\Model
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function assets(Illuminate\Database\Eloquent\Model $model)
    {
        return $this->morphedByMany($model, 'unsplashables');
    }

    /**
     * Creates a new instance of the unsplash api client
     * @return MarkSitko\LaravelUnsplash\Unsplash
     */
    public static function api()
    {
        return new Unsplash();
    }

    /**
     * Returns a complete copyright link for a given data set
     * @return string
     */
    public function getFullCopyrightLink()
    {
        return "Photo by <a target='_blank' href='{$this->author_link}'>{$this->author}</a> on <a target='_blank' href='https://unsplash.com/'>Unsplash</a>";
    }

}
