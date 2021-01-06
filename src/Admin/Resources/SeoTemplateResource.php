<?php

namespace Leeto\Seo\Admin\Resources;

use Illuminate\Support\Facades\File;
use Leeto\Admin\Components\Fields\Editor;
use Leeto\Admin\Components\Fields\Select;
use Leeto\Seo\Models\SeoTemplate;

use Leeto\Admin\Components\Fields\ID;
use Leeto\Admin\Components\Fields\Text;

use Leeto\Admin\Resources\Resource;
use Leeto\Seo\Traits\Seo;


/**
 * Class SeoTemplateResource
 * @package Leeto\Seo\Admin\Resources
 */
class SeoTemplateResource extends Resource
{
    /**
     * @var string
     */
    public static $model = SeoTemplate::class;

    /**
     * @var string
     */
    public $title = "Seo template";

    /**
     * @return array
     */
    public function fields()
	{
		return [
            ID::make("id")->sortable(),
            Text::make("title"),
            Text::make("description"),
            Text::make("keywords"),
            Text::make("h1"),
            Editor::make("text")->index(false),
            Select::make("model_class")->options($this->getSeoModels()),
        ];
	}

    /**
     * @param $item
     * @return array
     */
    public function rules($item) {
	    return [];
    }

    /**
     * @return array
     */
    public function search()
    {
        return ["id"];
    }

    /**
     * @return array
     */
    public function filters()
    {
        return [];
    }

    /**
     * @return array
     */
    public function attributes() {
	    return [
            "id" => "ID",
            "title" => "Title",
            "description" => "Description",
            "keywords" => "Keywords",
            "h1" => "H1",
            "text" => "Text",
            "model_class" => "Model",
        ];
    }

    /*
     * @return array
     */
    protected function getSeoModels() {
        $appNamespace = \Illuminate\Container\Container::getInstance()->getNamespace();
        $modelNamespace = 'Models';
        $models = [];

        foreach (File::allFiles(config("seo.models_path")) as $item) {
            $rel   = $item->getRelativePathName();
            $class = sprintf('\%s%s%s', $appNamespace, $modelNamespace ? $modelNamespace . '\\' : '',
                    implode('\\', explode('/', substr($rel, 0, strrpos($rel, '.')))));

            if(in_array(Seo::class, class_uses($class))) {
                $models[$class] = $class;
            }
        }

        return $models;
    }
}
