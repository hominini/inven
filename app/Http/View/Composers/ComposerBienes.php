<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class ComposerBienes
{
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        //$this->users = $users;
    }

    /**
     * Vinculando data a la/s vista/s.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $ubicaciones = \App\Ubicacion::all();
        $usuarios_finales = \App\UsuarioFinal::all();

        // ligando datos de las ubicaciones y usuarios_finales a la vista
        $view->with('ubicaciones', $ubicaciones);
        $view->with('usuarios_finales', $usuarios_finales);

    }
}
