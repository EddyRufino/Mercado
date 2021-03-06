<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'apellido' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'direccion' => $faker->address,
        'telefono' => $faker->randomElement(['1', '2', '3', '4', '5' ,'6', '7', '8', '9']),
        'dni' => '',
        'email_verified_at' => now(),
        'password' => 'password', // porque en user.php estoy encriptando
        'remember_token' => Str::random(10),
    ];
});
