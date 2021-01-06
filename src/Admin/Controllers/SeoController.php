<?php

namespace Leeto\Seo\Admin\Controllers;

use Leeto\Seo\Admin\Resources\SeoResource;

use Leeto\Admin\Controllers\Controller;
use Leeto\Admin\Traits\ControllerTrait;

/**
 * Class SeoController
 * @package Leeto\Seo\Admin\Controllers
 */
class SeoController extends Controller
{
    use ControllerTrait;

    /**
     * SeoController constructor.
     */
    public function __construct()
    {
        $this->resource = new SeoResource();
    }
}
