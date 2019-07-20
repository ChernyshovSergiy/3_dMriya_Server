<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
