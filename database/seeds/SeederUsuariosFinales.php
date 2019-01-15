<?php

use Illuminate\Database\Seeder;

class SeederUsuariosFinales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ufinales = factory(App\UsuarioFinal::class, 5)->create();

        foreach ($ufinales as $uf) {

            // se le asigna 3 bienes al azar a cada usuario final
            for ($i = 0; $i < 3; $i++) {
                $bien = \App\Bien::find(rand(1, 50));
                $uf->bienes()->save($bien);
            }
        }
    }
}
