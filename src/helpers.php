<?php

namespace Leeto\Seo;

if (!function_exists('seo')) {
    /**
     * Get the seo instance.
     *
     * @return \Leeto\Seo\SeoManager
     */
    function seo()
    {
        return app("seo");
    }
}