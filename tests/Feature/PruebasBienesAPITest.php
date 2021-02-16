<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;;

class PruebasBienesAPITest extends TestCase
{
    public function por_medio_de_la_api_se_obtienen_todos_los_bienes()
    {
        $this->withoutExceptionHandling();

        // preparar data'
        $bienes = \App\Bien::all();

        // intentar petición
        $respuesta = $this->json('GET', '/api/bienes');

        // valorar el resultado
        $respuesta
            ->assertStatus(201)
            ->assertJson([
                // 'bienes' =
            ]);
    }


}
