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
        factory(App\Bien::class, 5)->create([
            'id_ubicacion' => 1,
        ]);

        factory(App\Bien::class, 4)->create([
            'id_ubicacion' => 2,
        ]);

        factory(App\Bien::class, 5)->create([
            'id_ubicacion' => 3,
        ]);

        factory(App\Bien::class, 1)->create([
            'id_ubicacion' => 4,
        ]);
    }
}
