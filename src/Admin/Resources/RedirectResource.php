<?php

namespace Leeto\Seo\Admin\Resources;

use Leeto\Seo\Models\Redirect;

use Leeto\Admin\Components\Fields\ID;
use Leeto\Admin\Components\Fields\Text;
use Leeto\Admin\Components\Filters\TextFilter;

use Leeto\Admin\Resources\Resource;


/**
 * Class RedirectResource
 * @package Leeto\Seo\Admin\Resources
 */
class RedirectResource extends Resource
{
    /**
     * @var string
     */
    public static $model = Redirect::class;

    /**
     * @var string
     */
    public $title = "Redirects";

    /**
     * @return array
     */
    public function fields()
	{
		return [
            ID::make("id")->sortable(),
            Text::make("url")->required(),
            Text::make("to")->required(),
            Text::make("code")->required(),
        ];
	}

    /**
     * @param $item
     * @return array
     */
    public function rules($item) {
	    return [
            "url" => "required",
            "to" => "required",
            "code" => "in:301,302,303,307,308"
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
            "to" => "Redirect to",
            "code" => "Redirect code",
        ];
    }
}
