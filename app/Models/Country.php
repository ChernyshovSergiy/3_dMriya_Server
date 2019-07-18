<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Country extends Model
{
    public function getCountryListByLanguages($data)
    {
        if ($data->get('cLang') === 'ua'){
            $lang = 'uk';
        } else{
            $lang = $data->get('cLang');
        }
         $countries = self::where(strtolower('lang'), '=', $lang)->get()
            ->sortBy('country_name')
            ->pluck( 'country_name', 'country_numeric_code')->values()->all();

        return $countries;
    }
}
