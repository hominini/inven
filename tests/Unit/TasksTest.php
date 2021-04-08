<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;


class TasksTest extends TestCase
{
   
    public function testConteoRespuestaExitosa()
    {
        $this->withoutExceptionHandling();

        Passport::actingAs(
            factory(User::class)->make(),
            [],
        );

        $response = $this->json(
            'POST',
            'api/evaluarConteo',
            [
                'conteos' => [
                    [
                        'codigoBien' => 'fghhd',
                        'cantidad' => 1,
                    ],
                    [
                        'codigoBien' => 'fgjhf',
                        'cantidad' => 1,
                    ],
                    [
                        'codigoBien' => 'qetgc',
                        'cantidad' => 1,
                    ],
                ],
                'id_asignacion_tarea' => 2,
            ]
        );

        // $response->dumpHeaders();

        // $response->dumpSession();

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'resultado' => 1,
            ]);
    }

    public function testFuncionalidadBajas()
    {
        $this->withoutExceptionHandling();

        Passport::actingAs(
            factory(User::class)->make(),
            [],
        );

        $response = $this->json(
            'POST',
            'api/evaluarConteo',
            [
                'conteos' => [
                    [
                        'codigoBien' => 'fghhd',
                        'cantidad' => 1,
                    ],
                    [
                        'codigoBien' => 'fgjhf',
                        'cantidad' => 1,
                    ],
                    [
                        'codigoBien' => 'qetgc',
                        'cantidad' => 1,
                    ],
                ],
                'id_asignacion_tarea' => 2,
            ]
        );

        // $response->dumpHeaders();

        // $response->dumpSession();

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'resultado' => 1,
            ]);
    }
}
