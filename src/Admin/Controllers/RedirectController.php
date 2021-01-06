<?php

namespace Leeto\Seo\Admin\Controllers;

use Leeto\Seo\Admin\Resources\RedirectResource;

use Leeto\Admin\Controllers\Controller;
use Leeto\Admin\Traits\ControllerTrait;

/**
 * Class RedirectController
 * @package Leeto\Seo\Admin\Controllers
 */
class RedirectController extends Controller
{
    use ControllerTrait;

    /**
     * RedirectController constructor.
     */
    public function __construct()
    {
        $this->resource = new RedirectResource();
    }
}
