<?php

use Illuminate\Database\Seeder;

class SeederTablaBienes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bienes')->insert([
            'nombre' => 'mesa azul',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 1,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '123abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'silla de metal negra',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 1,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '001abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'mesa roja',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 1,
            'codigo_barras' => '002abc',
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'pizarra',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 1,
            'codigo_barras' => '003abc',
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'proyector blanco',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 1,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '004abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'mesa roja',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 2,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '005abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'mesa de madera negra',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 2,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '006abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'proyector',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 2,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '007abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'computadora',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 2,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '008abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'computador',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 3,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '009abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'mesa de madera negra',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 3,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '010abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'pizarra',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 4,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '011abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'proyector blanco',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 4,
            'observaciones' => 'Sala de profesores ubicada en el 2do piso.',
            'codigo_barras' => '012abc',
        ]);

    }
}
