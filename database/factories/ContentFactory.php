<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'text:en' => $faker->sentence(3),
        'text:ru' => $faker->sentence(5),
    ];
});
