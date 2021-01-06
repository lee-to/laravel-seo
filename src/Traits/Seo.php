<?php

namespace Leeto\Seo\Traits;


use Leeto\Seo\Models\SeoTemplate;

trait Seo
{
    public function seo() {
        $seo = SeoTemplate::where(["model_class" => get_class($this)])->orWhere(["model_class" => "\\" . get_class($this)])->first();

        if($seo) {
            foreach ($seo->getFillable() as $field) {
                if(preg_match("/\{(.+?)\}/", $seo->{$field}, $match)) {
                    $seo->{$field} = str_replace($match[0], $this->{$match[1]}, $seo->{$field});
                }
            }

            app("seo")->setSeo($seo);
        }
    }
}