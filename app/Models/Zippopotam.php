<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Zippopotam
 *
 * @property int $id
 * @property string $country
 * @property string $country_alpha2_code
 * @property string $example_url
 * @property string $range
 * @property string|null $mask
 * @property int $count
 * @property int $characters
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereCharacters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereCountryAlpha2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereExampleUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereMask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zippopotam whereRange($value)
 * @mixin \Eloquent
 */
class Zippopotam extends Model
{
    protected $hidden = [
        'id',
        'country',
        'country_alpha2_code',
        'example_url',
        'count'
    ];

    public function getCountryZipCodeMask($data)
    {
        $country_code = $data->get('country_alpha2_code');
        if ($country_code !== '') {
            return self::where('country_alpha2_code', '=', $country_code)->first();
        }

    }
}
