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
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $ubicaciones = \App\Ubicacion::all();
        $view->with('ubicaciones', $ubicaciones);
    }
}
