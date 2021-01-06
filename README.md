# laravel-seo

## Install
- composer require lee-to/laravel-seo

- php artisan vendor:publish --provider="Leeto\Seo\Providers\SeoServiceProvider"

## Usage 
- add seo template trait to model "use Leeto\Seo\Traits\Seo" and call $model->seo();
