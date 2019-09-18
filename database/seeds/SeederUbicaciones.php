<?php

use Illuminate\Database\Seeder;

class SeederUbicaciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicaciones')->insert([
            'id_padre' => null,
            'nombre' => 'Sala de Profesores No.1',
            'comentarios' => 'Sala de profesores ubicada en el 2do piso.',
            'nombre_cuarto' => 'Ingapirca',
            'nombre_edificio' => 'Edificio principal',
        ]);

        DB::table('ubicaciones')->insert([
            'id_padre' => null,
            'nombre' => 'Sala de Profesores No.2',
            'comentarios' => 'Sala de profesores ubicada en el 1er piso.',
            'nombre_cuarto' => 'Atahualpa',
            'nombre_edificio' => 'Edificio principal',
        ]);

        DB::table('ubicaciones')->insert([
            'id_padre' => null,
            'nombre' => 'Oficina de seguridad',
            'comentarios' => 'Oficina de seguridad ubicada en el 2do piso.',
            'nombre_cuarto' => 'Ingapirca',
            'nombre_edificio' => 'Edificio heroes del cenepa',
        ]);

        DB::table('ubicaciones')->insert([
            'id_padre' => null,
            'nombre' => 'Recepción',
            'comentarios' => 'no',
            'nombre_cuarto' => 'Ingapirca',
            'nombre_edificio' => 'Edificio principal',
        ]);

        DB::table('ubicaciones')->insert([
            'id_padre' => null,
            'nombre' => 'Laboratorio de idiomas #3',
            'comentarios' => 'Laboratorio de idiomas ubicada en el 2do piso.',
            'nombre_cuarto' => 'Ingapirca',
            'nombre_edificio' => 'Edificio principal',
        ]);
    }
}
