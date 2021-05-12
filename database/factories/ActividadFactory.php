<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actividad;
use Faker\Generator as Faker;

$factory->define(Actividad::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['Abarrotes', 'Peluquería', 'Almacen', 'Accesorios Multimedia', 'Librería', 'Refrescos', 'Verduras', 'Vent. Comida', 'Plásticos', 'Ropa', 'Juguetes', 'Gaseosas', 'Bazar', 'Utencilios', 'Pollos', 'Condimentos', 'Frutas', 'Visuteria', 'Zapatos', 'Ferreteria', 'Art. Limpieza', 'Carnes', 'Pollos y Canes', 'Pescado', 'Pasamaderia']),
    ];
});
