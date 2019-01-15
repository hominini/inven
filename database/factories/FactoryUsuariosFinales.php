<?php

use Faker\Generator as Faker;

$factory->define(App\UsuarioFinal::class, function (Faker $faker) {
    return [
      'documento_identificacion' => $faker->creditCardNumber,
      'nombre' => $faker->firstNameFemale,
      'apellidos' => $faker->lastName,
    ];
});
