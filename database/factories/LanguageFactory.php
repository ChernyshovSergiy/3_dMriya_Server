<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Language;
use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {
    return [
        'flag_country' => $faker->unique()->countryCode,
//        'code' => $faker->unique()->languageCode,
        'code' => 'mu',
        'iso' => $faker->unique()->locale,
        'file' => $faker->unique()->locale.'.js',
        'name' => $faker->unique()->country
    ];
});
