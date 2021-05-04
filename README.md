# laravel-seo

## Install
- composer require lee-to/laravel-seo

- php artisan vendor:publish --provider="Leeto\Seo\Providers\SeoServiceProvider"

## Usage 
- add seo template trait to model 

```php
use Leeto\Seo\Traits\Seo
```

and call in controller
```php
$model->seo();
```

- in AppServiceProvider 
```php
//boot

seo()->generate();
```

- in view 

```blade
{!! \Seo::meta() !!}
{!! \Seo::h1() !!}
{!! \Seo::text() !!}
```

## Integration with laravel-admin
- add to admin route

```php
Route::resource('seo', \Leeto\Seo\Admin\Controllers\SeoController::class);
Route::resource('seotemplates', \Leeto\Seo\Admin\Controllers\SeoTemplateController::class);
Route::resource('redirects', \Leeto\Seo\Admin\Controllers\RedirectController::class);
```
        
- add to admin menu

```php
["class" =>\Leeto\Seo\Admin\Controllers\SeoController::class, "title" => "Seo"],
["class" =>\Leeto\Seo\Admin\Controllers\SeoTemplateController::class, "title" => "Seo templates"],
["class" =>\Leeto\Seo\Admin\Controllers\RedirectController::class, "title" => "Redirects"],
```
