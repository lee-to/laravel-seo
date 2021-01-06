<?php

namespace Leeto\Seo;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Leeto\Seo\SubscriptionManager
 */
class Seo extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'seo';
    }
}
