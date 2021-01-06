<?php

namespace Leeto\Seo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SeoTemplate
 * @package Leeto\Seo\Models
 */
class SeoTemplate extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ["title", "description", "keywords", "h1", "text", "model_class"];
}
