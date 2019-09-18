<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'admin@admin.org',
            'password' => bcrypt('password'),
            'nombres' => 'webmaster',
            'apellidos' => 'webmaster',
            'cedula' => '1723749501',
            'cargo' => 'admin',
            'area' => 'Tecnologia',
            'id_institucion' => 1,
        ]);
    }
}
