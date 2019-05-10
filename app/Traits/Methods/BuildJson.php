<?php

namespace App\Traits\Methods;

use App\Models\Language;

trait BuildJson
{
    public $column;

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

    public function setJson($request, $text_blocks) :string
    {
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'code', 'id')->all();
        $text = array();
        $lang = array();
        foreach ($text_blocks as $block) {
            foreach ($languages as $key => $language) {
                if ($key === 1) {
                    $lang = [$language => $request->get($block . ':' . $language)];
                }else {
                    $lang[$language] = $request->get($block . ':' . $language);
                }
            }
            $text = array_add($text, $block, $lang);
        }
        return json_encode($text);
    }

}
