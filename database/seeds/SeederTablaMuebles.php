<?php

use Illuminate\Database\Seeder;

class SeederTablaMuebles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bienes = factory(App\Bien::class, 50)->create();
        foreach ($bienes as $bien) {
            $muebles = factory(App\Mueble::class)->create(['id_bien' => $bien->id]);
        }
    }
}
