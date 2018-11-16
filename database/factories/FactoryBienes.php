<?php

use Faker\Generator as Faker;

$factory->define(App\Bien::class, function (Faker $faker) {
    return [
        'id_ubicacion' => 1,
        'nombre' => $faker->sentence,
        'clase' => 'CONTROL ADMINISTRATIVO',
        'codigo' => $faker->ean13,
        'id_usuario_final' => 1,
        'fecha_de_adquisicion' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'acta_de_recepcion' => "dummy_binary",
        'id_responsable' => 1,
        'periodo_de_garantia' => 3,
        'estado' => $faker->word,
        'imagen' => "dummy_binary",
        'observaciones' => $faker->sentence,
        'fecha_de_caducidad' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'peligrosidad' => $faker->word,
        'manejo_especial' => $faker->sentence,
        'valor_unitario' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
        'tiempo_de_vida_util' => $faker->randomDigit,
        'id_actividad' => 1,
        'en_uso' => $faker->boolean,
        'descripcion' => $faker->paragraph,
    ];
});

$factory->define(App\Mueble::class, function (Faker $faker) {
    return [
        'id_bien' => 1,
        'id_tipo_de_bien' => 3,
        'color' => $faker->word,
        'dimensiones' => $faker->word,
    ];
});
