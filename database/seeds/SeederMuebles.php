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
        $bienes = factory(App\Bien::class, 50)->create();
        foreach ($bienes as $bien) {
            $bien_control_administrativo = factory(App\BienControlAdministrativo::class)->create(
                ['id_bien' => $bien->id]
            );

            factory(App\Mueble::class)->create(
                ['id_bien_control_administrativo' => $bien_control_administrativo->id]
            );
        }
    }
}
