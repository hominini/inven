<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Faker\Factory as Faker;

class MuebleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test__almacenar()
    {
        // definicion de inputs y outputs esperados
        $faker = Faker::create();
        $datos_post = array(
            '_token' => csrf_token(),
            'id_ubicacion' => 1,
            'nombre' => $faker->name,
            'clase' => 'CONTROL ADMINISTRATIVO',
            'codigo' => $faker->ean13,
            'id_usuario_final' => 1,
            'fecha_de_adquisicion' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'acta_de_recepcion' => "dummy_binary",
            'id_responsable' => 1,
            'periodo_de_garantia' => 3.5,
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
            'id_tipo_de_bien' => 1,
            'color' => 'azul',
            'dimensiones' => '2x3',
        );

        // ejecucion del componente en evaluacion
        $response = $this->call('POST', 'muebles', $datos_post);

        // evaluacion de resultados
        $this->assertDatabaseHas('bienes', [
            'nombre' => $datos_post['nombre'],
        ]);

        $this->assertDatabaseHas('muebles', [
            'color' => $datos_post['color'],
        ]);
    }

    public function test__actualizar()
    {
        // setup (pre-requisitos)
        $bien = factory('App\Bien')->create();
        $mueble = factory('App\Mueble')->create(['id_bien' => $bien->id]);

        $faker = Faker::create();
        $datos_post = array(
            '_token' => csrf_token(),
            'id_ubicacion' => 1,
            'nombre' => $faker->name,
            'clase' => 'CONTROL ADMINISTRATIVO',
            'codigo' => $faker->ean13,
            'id_usuario_final' => 1,
            'fecha_de_adquisicion' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'acta_de_recepcion' => "dummy_binary",
            'id_responsable' => 1,
            'periodo_de_garantia' => 3.5,
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
            'id_tipo_de_bien' => 1,
            'color' => 'azul',
            'dimensiones' => '2x3',
        );

        // ejecucion del componente en evaluacion
        $response = $this->call('PUT', 'muebles/1', $datos_post);

        // evaluacion de resultados
        $this->assertDatabaseHas('muebles', [
            'color' => 'azul',
        ]);
    }

    public function test__destruir()
    {
        // setup
        $bien = factory('App\Bien')->create();
        $mueble = factory('App\Mueble')->create(['id_bien' => $bien->id]);
        $id_mueble_a_eliminar = $mueble->id;
        $id_del_bien_asociado = $bien->id;

        // ejecucion del componente en evaluacion
        $response = $this->call('DELETE', 'muebles/'.$id_mueble_a_eliminar);

        // evaluacion de resultados
        $this->assertDatabaseMissing('bienes', [
            'id' => $id_del_bien_asociado,
        ]);
        $this->assertDatabaseMissing('muebles', [
            'id' => $id_mueble_a_eliminar,
        ]);
    }
}
