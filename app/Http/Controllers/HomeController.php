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
        $contador1 = 0;
        foreach ($tareas as $tarea){
            $contador1 = $contador1 + 1 ;
        }

        $contador2 = 0;
        foreach ($tareas as $tarea){
            if ($tarea->completada == 0){
                $contador2 = $contador2 + 1;
            }
        }

        return view('home', compact('bienes','contador','contador1','tareas', 'contador2'));
    }


}
