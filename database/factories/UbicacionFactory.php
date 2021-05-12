<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ubicacion;
use Faker\Generator as Faker;

$factory->define(Ubicacion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['Interior', 'Gruta - Interior', 'Plataforma', 'Mesa Redonda - Plataforma', 'Locales del Exterior', 'Locales - Plataforma', 'Locales del Interior', 'Ambulantes', 'Kioskos Plataforma', 'Kioskos del Interior', 'Tiendas del Exterior']),
    ];
});
