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
        $ubicaciones = factory(App\Ubicacion::class, 5)->create();
    }
}
