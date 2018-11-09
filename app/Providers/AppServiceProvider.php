<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Para evitar error "max length key" en migraciones
        Schema::defaultStringLength(191);

        /*
        Mapeo para poder utilizar Route::resource(), esto evita tener que mapear
        manualmente los nombres de las "acciones" en los controladores
        */
        Route::resourceVerbs([
            'index'     => 'indice',
            'create'    => 'crear',
            'store'     => 'almacenar',
            'show'      => 'mostrar',
            'edit'      => 'editar',
            'update'    => 'actualizar',
            'destroy'   => 'destruir',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
