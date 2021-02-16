<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => 'admin@admin.foo',
        'email_verified_at' => now(),
        'password' => 'password', // password
        'remember_token' => Str::random(10),
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'cedula' => '1723749501',
        'es_administrador' => 0,
    ];
});
