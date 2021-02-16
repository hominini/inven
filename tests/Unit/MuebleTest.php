<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


use Faker\Factory as Faker;

class MuebleTest extends TestCase
{

    public function test__almacenar()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        // $this->withoutExceptionHandling();

        // definicion de inputs y outputs esperados
        // objeto que permite crear datos falsos
        $faker = Faker::create();

        // array con todos los atributos que pueden ser pasados atraves del
        // formulario de creación de un mueble
        $datos_post = array(
            '_token' => csrf_token(),
            'id_ubicacion' => 1,
            'nombre' => $faker->name,
            'clase' => 'CONTROL ADMINISTRATIVO',
            'codigo' => $faker->ean13,
            'fecha_de_adquisicion' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'acta_de_recepcion' => UploadedFile::fake()->create('acta_test.pdf'),
            'id_responsable' => 1,
            'periodo_de_garantia' => 3.5,
            'estado' => $faker->word,
            'imagen' => "dummy_binary",
            'observaciones' => $faker->sentence,
            'caducidad' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'peligrosidad' => $faker->word,
            'manejo_especial' => $faker->sentence,
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
            'vida_util' => $faker->randomDigit,
            'id_actividad' => 1,
            'en_uso' => $faker->boolean,
            'descripcion' => $faker->paragraph,
            'id_tipo_de_bien' => 1,
            'color' => 'azul',
            'dimensiones' => '2x3',
        );

        // ejecucion del componente en evaluacion
        // ingresando el formulario
        $response = $this->call('POST', 'muebles', $datos_post);
        
        // Evaluacion de resultados
        // asegurando que exista un nuevo registro con datos esperados en la
        // tabla bienes
        $this->assertDatabaseHas('bienes', [
            'nombre' => $datos_post['nombre'],
            'codigo_barras' => $datos_post['codigo'],
        ]);

        // asegurando que exista un nuevo registro con datos esperados en la
        // tabla bienes_control_administrativo
        $this->assertDatabaseHas('bienes_control_administrativo', [
            'peligrosidad' => $datos_post['peligrosidad'],
        ]);

        // asegurando que exista un nuevo registro con datos esperados en la
        // tabla muebles
        $this->assertDatabaseHas('muebles', [
            'color' => $datos_post['color'],
        ]);
    }

    public function test__actualizar()
    {
        // setup
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->withoutExceptionHandling();

        $bien = factory('App\Bien')->create();

        // creacion de un bien de control administrativo
        $bien->bca = factory('App\BienControlAdministrativo')->create(
            ['id_bien' => $bien->id]
        );

        // creacion de un bien de control administrativo
        $bien->bca->mueble = factory('App\Mueble')->create(
            ['id_bien_control_administrativo' => $bien->bca->id]
        );

        $id_mueble = $bien->bca->mueble->id;

        $faker = Faker::create();
        $datos_post = array(
            '_token' => csrf_token(),
            'id_ubicacion' => 1,
            'nombre' => $faker->name,
            'clase' => 'CONTROL ADMINISTRATIVO',
            'codigo_barras' => $faker->ean13,
            'fecha_de_adquisicion' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'acta_de_recepcion' => "dummy_binary",
            'id_responsable' => 1,
            'periodo_de_garantia' => 3.5,
            'estado' => $faker->word,
            'imagen' => "dummy_binary",
            'observaciones' => $faker->sentence,
            'caducidad' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'peligrosidad' => $faker->word,
            'manejo_especial' => $faker->sentence,
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
            'vida_util' => $faker->randomDigit,
            'id_actividad' => 1,
            'en_uso' => $faker->boolean,
            'descripcion' => $faker->paragraph,
            'id_tipo_de_bien' => 1,
            'color' => 'azul',
            'dimensiones' => '2x3',
        );

        // ejecucion del componente en evaluacion
        $response = $this->call('PUT', 'muebles/' . $id_mueble, $datos_post);

        // $response->dumpHeaders();

        // $response->dump();

        // Evaluacion de resultados
        // asegurando que que se hayan actualizado datos en la
        // tabla bienes, bca, y muebles
        $this->assertDatabaseHas('bienes', [
            'nombre' => $datos_post['nombre'],
            'codigo_barras' => $datos_post['codigo_barras'],
        ]);

        // asegurando que exista un nuevo registro con datos esperados en la
        // tabla bienes_control_administrativo
        $this->assertDatabaseHas('bienes_control_administrativo', [
            'peligrosidad' => $datos_post['peligrosidad'],
        ]);

        // asegurando que exista un nuevo registro con datos esperados en la
        // tabla muebles
        $this->assertDatabaseHas('muebles', [
            'color' => $datos_post['color'],
        ]);
    }

    public function test__destruir()
    {
        // setup
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->withoutExceptionHandling();

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
