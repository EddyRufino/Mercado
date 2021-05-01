<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Puesto;
use App\Pago;
use App\Tipo;
use Faker\Generator as Faker;

$factory->define(Pago::class, function (Faker $faker) {
    return [
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'num_operacion' => '',
        'monto_deposito' => '',
        'fecha_deposito' => '',
        'monto_remodelacion' => '',
        'monto_constancia' => '',
        'monto_agua' => '',
        'monto_sisa' => $faker->randomDigit,
        'puesto_id' => Puesto::all()->random()->id,
        'tipo_id' => Tipo::all()->random()->id,
    ];
});
