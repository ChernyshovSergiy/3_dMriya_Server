<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $lang
 * @property string $lang_name
 * @property string $country_alpha2_code
 * @property string $country_alpha3_code
 * @property string $country_numeric_code
 * @property string $country_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereCountryAlpha2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereCountryAlpha3Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereCountryNumericCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereLangName($value)
 * @mixin \Eloquent
 */
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
             ->orderBy('country_name')
             ->get()
             ->flatten()
             ->all();
        return $countries;
    }

    public function getAdminCountries()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        if ($locale === 'ua'){
            $lang = 'uk';
        }else{
            $lang = $locale;
        }
        return self::where(strtolower('lang'), '=', $lang)
            ->orderBy('country_name')
            ->pluck('country_name', 'country_alpha2_code')
            ->all();
    }
}
