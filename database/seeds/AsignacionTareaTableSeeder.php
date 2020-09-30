<?php

use Illuminate\Database\Seeder;

class AsignacionTareaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignaciones_tareas')->insert([
            'id_usuario' => 1,
            'id_ubicacion' => 1,
            'completada' => false,
            'tipo' => 'REGISTRO',
            'fecha_asignacion' => '2020-09-30',
        ]);

        DB::table('asignaciones_tareas')->insert([
            'id_usuario' => 1,
            'id_ubicacion' => 3,
            'completada' => false,
            'tipo' => 'CONTEO',
            'fecha_asignacion' => '2020-09-30',
        ]);

        DB::table('asignaciones_tareas')->insert([
            'id_usuario' => 1,
            'id_ubicacion' => 5,
            'completada' => false,
            'tipo' => 'BAJAS',
            'fecha_asignacion' => '2020-09-30',
        ]);

        DB::table('asignaciones_tareas')->insert([
            'id_usuario' => 2,
            'id_ubicacion' => 2,
            'completada' => false,
            'tipo' => 'REGISTRO',
            'fecha_asignacion' => '2020-09-30',
        ]);

        DB::table('asignaciones_tareas')->insert([
            'id_usuario' => 2,
            'id_ubicacion' => 2,
            'completada' => false,
            'tipo' => 'CONTEO',
            'fecha_asignacion' => '2020-09-30',
        ]);

        DB::table('asignaciones_tareas')->insert([
            'id_usuario' => 2,
            'id_ubicacion' => 4,
            'completada' => false,
            'tipo' => 'BAJAS',
            'fecha_asignacion' => '2020-09-30',
        ]);
    }
}
