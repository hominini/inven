<?php

use Faker\Generator as Faker;

$factory->define(App\Ubicacion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'comentarios' => $faker->paragraph,
        'nombre_cuarto' => $faker->sentence,
    ];
});
