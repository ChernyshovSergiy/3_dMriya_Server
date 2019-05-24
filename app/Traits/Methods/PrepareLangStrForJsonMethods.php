<?php

namespace App\Traits\Methods;


use App\Models\Language;

trait PrepareLangStrForJsonMethods
{

    public function createLangString($request, $column) :array
    {
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'code', 'id')->all();
        $items = [];
        foreach ($languages as $key => $language) {
            if ($key === 1) {
                $items = [$language => $request->get($column . ':' . $language)];
            } else {
                $items[$language] = $request->get($column . ':' . $language);
            }
        }
        return $items;
    }
}
