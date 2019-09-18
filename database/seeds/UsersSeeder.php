<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'maria',
            'email' => 'maria@mail.com',
            'password' => bcrypt('Maria123'),
            'nombres' => 'maria',
            'apellidos' => 'lopez',
            'cedula' => '1723749599',
            'cargo' => 'ninguno',
            'area' => 'Tecnologia',
            'id_institucion' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'jorge',
            'email' => 'jorge@mail.com',
            'password' => bcrypt('Jorge123'),
            'nombres' => 'jorge',
            'apellidos' => 'ramirez',
            'cedula' => '1723749598',
            'cargo' => 'ninguno',
            'area' => 'Tecnologia',
            'id_institucion' => 1,
        ]);


    }
}
