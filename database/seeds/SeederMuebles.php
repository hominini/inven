<?php

use Illuminate\Database\Seeder;

class SeederMuebles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $bienes = factory(App\Bien::class, 50)->create();
        // foreach ($bienes as $bien) {
        //     $bien_control_administrativo = factory(App\BienControlAdministrativo::class)->create(
        //         ['id_bien' => $bien->id]
        //     );

        //     factory(App\Mueble::class)->create(
        //         ['id_bien_control_administrativo' => $bien_control_administrativo->id]
        //     );
        // }

        DB::table('muebles')->insert([
            'id_bien_control_administrativo' => 1,
            'color' => 'verde',
            'dimensiones' => '40x39',
        ]);

        DB::table('muebles')->insert([
            'id_bien_control_administrativo' => 2,
            'color' => 'azul',
            'dimensiones' => '40x39',
        ]);

        DB::table('muebles')->insert([
            'id_bien_control_administrativo' => 3,
            'color' => 'blanco',
            'dimensiones' => '40x39',
        ]);

        DB::table('muebles')->insert([
            'id_bien_control_administrativo' => 4,
            'color' => 'azul',
            'dimensiones' => '40x39',
        ]);

        DB::table('muebles')->insert([
            'id_bien_control_administrativo' => 5,
            'color' => 'negro',
            'dimensiones' => '40x39',
        ]);

        DB::table('items_bibliograficos')->insert([
            'id_bien_control_administrativo' => 6,
            'autor' => 'abcd',
            'detalles_de_publicacion' => 'qwerty',
        ]);

        DB::table('items_bibliograficos')->insert([
            'id_bien_control_administrativo' => 7,
            'autor' => 'abcd',
            'detalles_de_publicacion' => 'qwerty',
        ]);

        DB::table('items_bibliograficos')->insert([
            'id_bien_control_administrativo' => 8,
            'autor' => 'abcd',
            'detalles_de_publicacion' => 'qwerty',
        ]);

        DB::table('items_bibliograficos')->insert([
            'id_bien_control_administrativo' => 9,
            'autor' => 'abcd',
            'detalles_de_publicacion' => 'qwerty',
        ]);

        DB::table('items_bibliograficos')->insert([
            'id_bien_control_administrativo' => 10,
            'autor' => 'abcd',
            'detalles_de_publicacion' => 'qwerty',
        ]);

        DB::table('bienes_tecnologicos')->insert([
            'id_bien_control_administrativo' => 11,
            'numero_de_serie' => 'abc123xyz',
            'modelo' => '123456',
            'marca' => 'Samsumg',
        ]);

        DB::table('bienes_tecnologicos')->insert([
            'id_bien_control_administrativo' => 12,
            'numero_de_serie' => 'abc123xyz',
            'modelo' => '123456',
            'marca' => 'Samsumg',
        ]);

        DB::table('bienes_tecnologicos')->insert([
            'id_bien_control_administrativo' => 13,
            'numero_de_serie' => 'abc123xyz',
            'modelo' => '123456',
            'marca' => 'Samsumg',
        ]);

        DB::table('bienes_tecnologicos')->insert([
            'id_bien_control_administrativo' => 14,
            'numero_de_serie' => 'abc123xyz',
            'modelo' => '123456',
            'marca' => 'Samsumg',
        ]);

        DB::table('bienes_tecnologicos')->insert([
            'id_bien_control_administrativo' => 15,
            'numero_de_serie' => 'abc123xyz',
            'modelo' => '123456',
            'marca' => 'Samsumg',
        ]);

    }
}
