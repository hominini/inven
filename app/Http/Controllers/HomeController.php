<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bien;

use App\AsignacionTarea;

class HomeController extends Controller
{
    /**
     ** Constructor
     **/
    public function __construct()
    {
        // Protejiendo la ruta que llama a éste controlador
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $bienes = Bien::all();
         $contador = 0;
        foreach ($bienes as $bien){
            $contador = $contador + 1 ;
        }

        $tareas = AsignacionTarea::all();

        $n_tareas = 0;
        foreach ($tareas as $tarea){
            $n_tareas = $n_tareas + 1 ;
        }

        $n_completadas = 0;
        foreach ($tareas as $tarea){
            if ($tarea->completada == 1){
                $n_completadas = $n_completadas + 1;
            }
        }

        $n_bajas = $bienes->filter(function ($b) {
            return $b->is_baja == 1;
        })->count();

        return view('home', compact(
            'bienes',
            'contador',
            'n_tareas',
            'tareas',
            'n_completadas',
            'n_bajas'
        ));
    }


}
