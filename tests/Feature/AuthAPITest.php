<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthAPITest extends TestCase
{
    /** @test */
    public function usuario_se_puede_registrar_atraves_de_la_api()
    {
        $this->withoutExceptionHandling();
        // preparar data
        $data2 = [
            'form-params' => [
                'name' => 'admin@admin.com',
                'email' => 'admin@admin.com',
                'password' => 'password',
                'c_password' => 'password',
            ],
        ];
        $data = [
            'name' => 'admin@admin.com',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'c_password' => 'password',
        ];

        // intentar la petición
        $respuesta = $this->json('POST', '/api/register', $data);

        $respuesta->dump();
        // valorar el resultado
        $respuesta->assertStatus(201);
    }
}
