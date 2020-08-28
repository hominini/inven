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
            'codigo_barras' => '123abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'silla de metal negra',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 2,
            'codigo_barras' => '001abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'mesa roja',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 3,
            'codigo_barras' => '002abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'pizarra',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 4,
            'codigo_barras' => '003abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'proyector blanco',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 5,
            'codigo_barras' => '004abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Turismo en el Ecuador',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 1,
            'codigo_barras' => '005abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Mecánica Automotriz',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 2,
            'codigo_barras' => '006abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Electrónica',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 3,
            'codigo_barras' => '007abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Libro de Cálculo',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 4,
            'codigo_barras' => '008abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Libro de Ecología',
            'descripcion' => 'mesa azul',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 5,
            'codigo_barras' => '009abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Computadora de mesa DL',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 1,
            'codigo_barras' => '010abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Computadora de mesa DL',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 2,
            'codigo_barras' => '011abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Computadora de mesa DL',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 3,
            'codigo_barras' => '012abc',
        ]);

        DB::table('bienes')->insert([
            'nombre' => 'Impresora Xerox',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 4,
            'codigo_barras' => '013abc',
        ]);

        DB::table('bienes')->insert([
            'id' => 15,
            'nombre' => 'Laptop HP',
            'clase' => 'CONTROL ADMINISTRATIVO',
            'id_ubicacion' => 5,
            'codigo_barras' => '014abc',
        ]);

    }
}
