<?php

use Illuminate\Database\Seeder;

class BCASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bienes_control_administrativo')->insert([
            'id' => 1,
            'id_bien' => 1,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 2,
            'id_bien' => 2,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 3,
            'id_bien' => 3,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 4,
            'id_bien' => 4,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 5,
            'id_bien' => 5,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 6,
            'id_bien' => 6,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 7,
            'id_bien' => 7,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 8,
            'id_bien' => 8,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 9,
            'id_bien' => 9,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 10,
            'id_bien' => 10,
            'estado' => 'MALO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 11,
            'id_bien' => 11,
            'estado' => 'MALO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 12,
            'id_bien' => 12,
            'estado' => 'MALO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 13,
            'id_bien' => 13,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 14,
            'id_bien' => 14,
            'estado' => 'BUENO',
        ]);

        DB::table('bienes_control_administrativo')->insert([
            'id' => 15,
            'id_bien' => 15,
            'estado' => 'BUENO',
        ]);

    }
}
