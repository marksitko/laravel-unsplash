# Powerful Unsplash package for Laravel

Provides a fluent api to use the Unsplash API within Larvel applications. Use public actions or store images directly in your storage and persists all copyright informations automatically with the databse connector.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marksitko/laravel-unsplash.svg?style=flat-square)](https://packagist.org/packages/marksitko/laravel-unsplash)
[![Build Status](https://img.shields.io/travis/marksitko/laravel-unsplash/master.svg?style=flat-square)](https://travis-ci.org/marksitko/laravel-unsplash)
[![Quality Score](https://img.shields.io/scrutinizer/g/marksitko/laravel-unsplash.svg?style=flat-square)](https://scrutinizer-ci.com/g/marksitko/laravel-unsplash)
[![Total Downloads](https://img.shields.io/packagist/dt/marksitko/laravel-unsplash.svg?style=flat-square)](https://packagist.org/packages/marksitko/laravel-unsplash)


## Install

``` bash
$ composer require marksitko/laravel-unsplash
```

The package provides package discovery and Laravel will automatically register the service provider and facade. If you want add it manually you have to do it provide in your `config/app.php`

**Service provider**
``` php 
'providers' => [
    //...
    MarkSitko\LaravelUnsplash\UnsplashServiceProvider::class,
];
```

**Facade**
``` php 
'aliases' => [
    //...
    'Unsplash' => MarkSitko\LaravelUnsplash\UnsplashFacade::class,
];
```

Next you should publish the configuration.
``` bash
$ php artisan vendor:publish --tag=config
```

###### Optional
If you wanna use Laravel-Unsplash with the database connector you have to publish the migration files.
``` bash
$ php artisan vendor:publish --tag=migrations
```
It creates 2 migrations. One to store additional informations about stored image and one morph table to use it with the `HasUnsplashables` trait. 

## Configuration
You have to provide a unsplash api access key in your `.env` file. 
[Read how to generate a Unsplash API key](https://unsplash.com/documentation#creating-a-developer-account)
```
UNSPLASH_ACCESS_KEY=YOUR_GENERATED_API_KEY_FROM_UNSPLASH
```

Optional configurations:
```
# default is false
UNSPLASH_STORE_IN_DATABASE=BOOLEAN

# default is local
UNSPLASH_STORAGE_DISK=YOUR_STORAGE_DISC
```


## Basic Usage

Take a look at the full Unsplash API documentation https://unsplash.com/documentation

**Random Photos**
``` php 
// Returns the http response body.
$twoRandomPhotosOfSomePeoples = Unsplash::randomPhoto()
    ->orientation('portrait')
    ->term('people')
    ->count(2)
    ->toJson();

// Store the image in on your provided disc
$theNameFromTheStoredPhoto = Unsplash::randomPhoto()
    ->orientation('landscape')
    ->term('music')
    ->randomPhoto()
    ->store();
];
```

**Photos**
``` php 
$photos = Unsplash::photos()->toJson();
$photo = Unsplash::photo($id)->toJson();
$photosStatistics = Unsplash::photosStatistics($id)->toJson();
$trackPhotoDownload = Unsplash::trackPhotoDownload($id)->toJson();
```

**Users**
``` php 
$user = Unsplash::user($username)->toJson();
$userPortfolio = Unsplash::userPortfolio($username)->toJson();
$userPhotos = Unsplash::userPhotos($username)->toJson();
$userLikes = Unsplash::userLikes($username)->toJson();
$userCollections = Unsplash::userCollections($username)->toJson();
$userStatistics = Unsplash::userStatistics($username)->toJson();
```

**Search**
``` php 
$search = Unsplash::search()
    ->term('buildings')
    ->color('black_and_white')
    ->orientation('squarish')
    ->toJson();

$searchCollections = Unsplash::searchCollections()
    ->query('events')
    ->page($pageNumber)
    ->toJson();

$searchUsers = Unsplash::searchUsers()
    ->query('search_term')
    ->toJson();
```

**Collections**
``` php 
$collectionsList = Unsplash::collectionsList()
    ->page($pageNumber)
    ->perPage($itemsPerPage)
    ->toJson();

$featuredCollection = Unsplash::featuredCollection()
    ->page($pageNumber)
    ->perPage($itemsPerPage)
    ->toJson();

$showCollection = Unsplash::showCollection()
    ->id($collectionId)
    ->toJson();

$showCollectionPhotos = Unsplash::showCollectionPhotos()
    ->id($collectionId)
    ->toJson();

$showCollectionRelatedCollections = Unsplash::showCollectionRelatedCollections()
    ->id($collectionId)
    ->toJson();
```

**Stats**
``` php 
$totalStats = Unsplash::totalStats()->toJson();
$monthlyStats = Unsplash::monthlyStats()->toJson();
```

## Usage with Database

If you wanna persist automaticly some informations (i.e. Copyrights) about you stored images you have to run the published migrations. In case you dont have ran the optional command, we start at the beginning:

``` bash
$ php artisan vendor:publish --tag=migrations
```

``` bash
$ php artisan migrate
```

When migration is successfull, you have to adjust the `.env`
```
UNSPLASH_STORE_IN_DATABASE=true
```

Now when you execute `store()` on the Unsplash client, the image is stored in your provided disc and informations like 
- the unsplash photo id
- the stored image name
- author name
- author link

However, these informations are all required to use a unsplash photo on your website.

**Example with Unsplash Client**
``` php 
// Returns the created unsplash asset record
$databaseRecord = Unsplash::randomPhoto()->store();
```

You are now also able to use the build in `UnsplashAsset` Model
**Example with UnsplashAsset Model**
``` php 
// Returns the created unsplash asset record
$databaseRecord = UnsplashAsset::api()->randomPhoto()->store();

// Get an stored unsplash asset
$unsplashAsset = UnsplashAsset::find($id);
```

You can also use the `HasUnsplashables` Trait on any model.

**Example with HasUnsplashables Trait on the User Model**
``` php 
use Illuminate\Foundation\Auth\User as Authenticatable;
use MarkSitko\LaravelUnsplash\Traits\HasUnsplashables;

class User extends Authenticatable
{
    use HasUnsplashables;

    // ...
}
```

Now you are able to use it like:
``` php 
// store the unsplash asset in a morphToMany relation
$unsplashAsset = Unsplash::randomPhoto()->store();
User::unsplash()->save($unsplashAsset);

// retrive all related unsplash assets
User::find($userId)->unsplash();
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
