<?php

namespace Leeto\Seo\Admin\Controllers;

use Leeto\Admin\Controllers\Controller;
use Leeto\Admin\Traits\ControllerTrait;
use Leeto\Seo\Admin\Resources\SeoTemplateResource;

/**
 * Class SeoTemplateController
 * @package Leeto\Seo\Admin\Controllers
 */
class SeoTemplateController extends Controller
{
    use ControllerTrait;

    /**
     * SeoTemplateController constructor.
     */
    public function __construct()
    {
        $this->resource = new SeoTemplateResource();
    }
}
