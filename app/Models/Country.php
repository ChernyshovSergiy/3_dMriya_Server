<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Country extends Model
{
    protected $hidden = [
        'id',
        'lang',
        'lang_name',
//        'country_alpha2_code',
        'country_alpha3_code',
        'country_numeric_code'
    ];
    public function getCountryListByLanguages($data)
    {
        if ($data->get('cLang') === 'ua'){
            $lang = 'uk';
        } else{
            $lang = $data->get('cLang');
        }
         $countries = self::where(strtolower('lang'), '=', $lang)
             ->get()
             ->sortBy('country_name')
//             ->pluck( 'country_name', 'country_alpha2_code')
//             ->values()
             ->flatten()
//             ->keyBy('country_alpha2_code')
             ->all();

        return $countries;
    }
}
