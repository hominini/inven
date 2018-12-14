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
            'peligrosidad' => $datos_post['peligrosidad'],
        ]);

        $this->assertDatabaseHas('bienes_control_administrativo', [
            'nombre' => $datos_post['nombre'],
        ]);

        $this->assertDatabaseHas('muebles', [
            'color' => $datos_post['color'],
        ]);
    }

    public function test__actualizar()
    {
        // setup
        $bien = factory('App\Bien')->create();

        // creacion de un bien de control administrativo
        $bien->bca = factory('App\BienControlAdministrativo')->create(
            ['id_bien' => $bien->id]
        );
        // creacion de un bien de control administrativo
        $bien->bca->mueble = factory('App\Mueble')->create(
            ['id_bien_control_administrativo' => $bien->bca->id]
        );

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

        // creacion de un bien de control administrativo
        $bien->bca = factory('App\BienControlAdministrativo')->create(
            ['id_bien' => $bien->id]
        );
        // creacion de un bien de control administrativo
        $bien->bca->mueble = factory('App\Mueble')->create(
            ['id_bien_control_administrativo' => $bien->bca->id]
        );

        // ids de registros a eliminar
        $id_mueble = $bien->bca->mueble->id;
        $id_bca = $bien->bca->id;
        $id_bien = $bien->id;

        // ejecucion del componente en evaluacion
        $response = $this->call('DELETE', 'muebles/'.$id_mueble);
        //dd($response->status());
        // evaluacion de resultados, luego de la eliminacion no deben existir
        // ningun registro con los ids recien creados, en las tablas correspondientes
        $this->assertDatabaseMissing('bienes', [
            'id' => $id_bien,
        ]);
        $this->assertDatabaseMissing('bienes_control_administrativo', [
            'id' => $id_bca,
        ]);
        $this->assertDatabaseMissing('muebles', [
            'id' => $id_mueble,
        ]);
    }
}
