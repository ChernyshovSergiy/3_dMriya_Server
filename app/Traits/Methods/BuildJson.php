<?php

namespace App\Traits\Methods;

use App\Models\Language;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait BuildJson
{
    public $column;
    public $language;
    public $model;

    public function build($model, $column)
    {
        $this->column = $column;
        $result = $model->get();
        if ($result->isEmpty()){
            return [];
        }
        $result->transform(function ($item){
            $column = $this->column;
            if (is_string($item->$column) && is_object(json_decode($item->$column)) && json_last_error() == JSON_ERROR_NONE){
                $item->$column = json_decode($item->$column);
            }
            return $item;
        });
        return $result;
    }

    /**
     * @param $model
     * @param $column
     * @param $language
     * @param $key
     * @return array
     */
    public function buildOneLang($model, $column, $language, $key) :array
    {
        $contents = $this->build($model, $column)->flatten()->keyBy($key);
        $this->language = $language;
        $this->model = $model;
        if (!$contents){
            return [];
        }
        $text_blocks = $this->model->getTextColumnsForTranslate();
        $text = array();
        $lang = array();
        foreach($contents as $i => $title)
        {
            $titleAr = json_decode(json_encode($title), true);
            foreach ($text_blocks as $k => $block ){

                    $lang[$block] = Arr::get($titleAr, 'content.'.$block.'.'.$language);

            }
            $text = Arr::add($text, $i, $lang);
        }
        return $text;
    }

    public function buildMenuOneLang($model, $column, $language) :array
    {
        $menus = $this->build($model, $column)->where('is_active','=',1)->flatten();
        $this->language = $language;
        $this->model = $model;
        if (!$menus){
            return [];
        }
        $menu_blocks = $this->model->getTextColumnsForTranslate();

        $full_value = array();
        foreach ($menu_blocks as $key => $name){
            $section = 'section'. (string)($key + 1);
            LaravelLocalization::setLocale($this->language);
            $lang_name = Lang::get('sections.'.$name);

            $text = array();
            foreach($menus as $i => $title)
            {
                $titleAr = json_decode(json_encode($title), true);
                if( $key === (int)Arr::get($titleAr,'section')){
                    $lang = Arr::add(['point' => Arr::get($titleAr, 'title.'.$language)], 'to', Arr::get($titleAr, 'url'));
                    $text = Arr::add($text, ++$i, $lang);
                    [$keys, $values] = Arr::divide($text);
                }

            }
            $value = Arr::add(['title' => $lang_name], 'points', $values);
            $full_value = Arr::add($full_value, $section, $value);
        }

        return $full_value;
    }

    public function setJson($request, $text_blocks) :string
    {
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'code', 'id')->all();
        $text = array();
        $lang = array();
        foreach ($text_blocks as $block) {
            foreach ($languages as $key => $language) {
                if (strpos($request->get($block . ':' . $language), '<p>') === 0) {
                    $content = substr($request->get($block . ':' . $language), 3, -4);
                } else {
                    $content = $request->get($block . ':' . $language);
                }

                if ($key === 1) {
                    $lang = [$language => $content];
                } else {
                    $lang[$language] = $content;
                }
            }
            $text = Arr::add($text, $block, $lang);
        }
        return json_encode($text);
    }

}
