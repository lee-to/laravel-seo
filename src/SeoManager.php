<?php

namespace Leeto\Seo;

use Leeto\Seo\Models\Redirect;
use Leeto\Seo\Models\Seo as SeoModel;
use Leeto\Seo\Models\SeoTemplate;

/**
 * Class SeoManager
 * @package Leeto\Seo
 */
class SeoManager
{
    /**
     * @var
     */
    protected $seoData;

    /**
     *
     */
    public function generate() {
        if($redirect = Redirect::where(["url" => "/" . trim(request()->path(), "/")])->first()) {
            redirect($redirect->to, $redirect->code)->send();
        }

        $this->setSeo(SeoModel::where(["url" => request()->path()])->first());
    }

    /**
     * @return string
     */
    public function meta() {
        $meta = "";
        $seo = $this->seoData;

        if($seo) {
            $meta .= "<title>{$seo->title}</title>" . PHP_EOL;
            $meta .= "<meta name=\"description\" content=\"{$seo->description}\">" . PHP_EOL;
            $meta .= "<meta name=\"keywords\" content=\"{$seo->keywords}\">" . PHP_EOL;

            $meta .= "<meta property=\"og:title\" content=\"{$seo->title}\" />" . PHP_EOL;
            $meta .= "<meta property=\"og:description\" content=\"{$seo->description}\"/>" . PHP_EOL;

            $meta .= "<meta property=\"og:type\" content=\"website\"/>" . PHP_EOL;
            $meta .= "<meta property=\"og:url\" content=\"".request()->getUri()."\"/>" . PHP_EOL;
            $meta .= "<meta property=\"og:locale\" content=\"".config("app.locale")."\"/>" . PHP_EOL;
            $meta .= "<meta property=\"og:site_name\" content=\"".request()->getHttpHost()."\"/>" . PHP_EOL;

            if(isset($seo->thumbnail) && $seo->thumbnail) {
                $meta .= "<meta property=\"og:image\" content=\"".$seo->getThumbnail()."\"/>" . PHP_EOL;
            }
        }

        return $meta;
    }

    /**
     * @param string $h1
     * @return string
     */
    public function h1($h1 = "") {
        return $this->seoData && $this->seoData->h1 ? $this->seoData->h1 : $h1;
    }

    /**
     * @param string $text
     * @return string
     */
    public function text($text = "") {
        return $this->seoData && $this->seoData->text ? $this->seoData->text : $text;
    }

    /**
     * @param SeoModel|SeoTemplate $seo
     */
    public function setSeo($seo) {
        $this->seoData = $seo;
    }
}
