<?php

namespace Leeto\Seo\Admin\Resources;

use Leeto\Admin\Components\Fields\Editor;
use Leeto\Admin\Components\Fields\Image;
use Leeto\Seo\Models\Seo;

use Leeto\Admin\Components\Fields\ID;
use Leeto\Admin\Components\Fields\Text;
use Leeto\Admin\Components\Filters\TextFilter;

use Leeto\Admin\Resources\Resource;


/**
 * Class SeoResource
 * @package Leeto\Seo\Admin\Resources
 */
class SeoResource extends Resource
{
    /**
     * @var string
     */
    public static $model = Seo::class;

    /**
     * @var string
     */
    public $title = "Seo";

    /**
     * @return array
     */
    public function fields()
	{
		return [
            ID::make("id")->sortable(),
            Text::make("url")->required(),
            Text::make("title"),
            Text::make("description"),
            Text::make("keywords"),
            Text::make("h1"),
            Editor::make("text")->index(false),
            Image::make("thumbnail")->index(false)
        ];
	}

    /**
     * @param $item
     * @return array
     */
    public function rules($item) {
	    return [
            "url" => "required",
            "thumbnail" => "image",
	    ];
    }

    /**
     * @return array
     */
    public function search()
    {
        return ["id", "url"];
    }

    /**
     * @return array
     */
    public function filters()
    {
        return [
            TextFilter::make("url"),
        ];
    }

    /**
     * @return array
     */
    public function attributes() {
	    return [
            "id" => "ID",
            "url" => "Url",
            "title" => "Title",
            "description" => "Description",
            "keywords" => "Keywords",
            "h1" => "H1",
            "text" => "Text",
            "thumbnail" => "Thumbnail",
        ];
    }
}
