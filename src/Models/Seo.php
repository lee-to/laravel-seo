<?php

namespace Leeto\Seo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Leeto\Seo\Casts\UrlCast;

/**
 * Class Seo
 * @package Leeto\Seo\Models
 */
class Seo extends Model
{
    use HasFactory;

    protected $table = "seo";

    /**
     * @var array
     */
    protected $fillable = ["url", "title", "description", "keywords", "h1", "text", "thumbnail"];

    /**
     * @var array
     */
    protected $casts = [
        "url" => UrlCast::class,
    ];

    public function getThumbnail()
    {
        return Storage::url($this->thumbnail);
    }
}
