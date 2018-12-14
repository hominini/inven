<?php

use Faker\Generator as Faker;

$factory->define(App\Bien::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence,
        'descripcion' => $faker->paragraph,
        'clase' => 'CONTROL ADMINISTRATIVO',
        'id_ubicacion' => 1,
        'id_usuario_final' => 1,
        'id_responsable' => 1,
        'fecha_de_adquisicion' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'imagen' => "dummy_binary",
        'observaciones' => $faker->sentence,
        'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
    ];
});

$factory->define(App\BienControlAdministrativo::class, function (Faker $faker) {
    return [
        'peligrosidad' => $faker->word,
    ];
});

$factory->define(App\Mueble::class, function (Faker $faker) {
    return [
        'id_bien_control_administrativo' => 1,
        'id_tipo_de_bien' => 3,
        'color' => $faker->word,
        'dimensiones' => $faker->word,
    ];
});
