<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Banio;
use Faker\Generator as Faker;

$factory->define(Banio::class, function (Faker $faker) {
    return [
        'monto_taza' => $faker->randomDigit,
        'monto_ducha' => $faker->randomDigit,
    ];
});
