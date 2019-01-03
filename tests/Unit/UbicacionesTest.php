<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Faker\Factory as Faker;

class UbicacionesTest extends TestCase
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
        // objeto que permite crear datos falsos
        $faker = Faker::create();

        // array con todos los atributos que pueden ser pasados atraves del
        // formulario de creación
        $datos_post = array(
            '_token' => csrf_token(),
            'nombre' => $faker->word,
            'nombre_cuarto' => $faker->sentence,
            'comentarios' => $faker->paragraph,
        );

        // ejecucion del componente en evaluacion
        // ingresando el formulario
        $response = $this->call('POST', 'ubicaciones', $datos_post);

        // Evaluacion de resultados
        // asegurando que exista un nuevo registro con datos esperados en la
        // tabla
        $this->assertDatabaseHas('ubicaciones', [
            'nombre' => $datos_post['nombre'],
        ]);
    }

    public function test__actualizar()
    {
        // Crea un registro de prueba
        $ubicacion = factory('App\Ubicacion')->create();
        // Obtiene el id del registro a modificar
        $id = $ubicacion->id;

        // objeto para creacion datos falsos
        $faker = Faker::create();

        // datos de la peticion falsa
        $datos_req = array(
            '_token' => csrf_token(),
            'nombre' => $faker->word,
            'nombre_cuarto' => $faker->sentence,
            'comentarios' => $faker->paragraph,
        );

        // ejecucion del componente en evaluacion
        $response = $this->call('PUT', 'ubicaciones/' . $id, $datos_req);

        // Evaluacion de resultados
        // asegurando que que se hayan actualizado datos en la
        // tabla bienes, bca, y ubicaciones
        $this->assertDatabaseHas('ubicaciones', [
            'nombre' => $datos_req['nombre'],
        ]);
    }

    public function test__destruir()
    {
      // Crea un registro de prueba
        $ubicacion = factory('App\Ubicacion')->create();

        // ids de registros a eliminar
        $id = $ubicacion->id;

        // datos de la peticion falsa
        $datos_req = array(
            '_token' => csrf_token(),
        );

        // ejecucion del componente en evaluacion
        $resp = $this->call('DELETE', 'ubicaciones/'.$id, $datos_req);
        dd(get_class();

        // evaluacion de resultados, luego de la eliminacion no deben existir
        // ningun registro con los ids recien creados, en las tablas correspondientes
        $this->assertDatabaseMissing('ubicaciones', [
            'id' => $id,
        ]);
    }
}
