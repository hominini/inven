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
        $bienes = factory(App\Bien::class, 50)->create();
    }
}
