<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promocion;
use Faker\Generator as Faker;

$factory->define(Promocion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'nombre_empresa' => $faker->name,
        'fecha_inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'fecha_fin' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'monto' => $faker->randomDigit,
    ];
});
