<?php

namespace Leeto\Seo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Leeto\Seo\Casts\UrlCast;

/**
 * Class Redirect
 * @package Leeto\Seo\Models
 */
class Redirect extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ["url", "to", "code"];

    /**
     * @var array
     */
    protected $casts = [
        "url" => UrlCast::class,
        "to" => UrlCast::class,
        "code" => "integer",
    ];
}
