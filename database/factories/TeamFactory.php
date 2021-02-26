<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=30),
        'team' => $faker->word . 'ズ',
        'address' => $faker->prefecture . $faker->city,
        'introduction' => $faker->realText,
    ];
});
