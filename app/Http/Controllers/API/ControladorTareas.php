<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ControladorTareas extends Controller
{
    public function getTareas(Request $request)
    {
        $todas_las_tareas = \App\AsignacionTarea::all();

        $tareas_usuario = $todas_las_tareas->filter(function($tarea) {
            return $tarea->id_usuario === Auth('api')->user()->id;
        });

        // return $todas_las_tareas;
        return $tareas_usuario->values();
    }

    public function solicitarBaja(Request $request, int $id)
    {
        return response()->json([
            'message' => 'Su solicitud ha sido enviada correctamente.'
        ]);
    }

    public function evaluarConteo(Request $request)
    {
        $dummy_response = (bool)random_int(0, 1);
        return response()->json([
            'countingResult' => $dummy_response,
            'message' => 'Su solicitud ha sido enviada correctamente.'
        ]);
    }

    public function ingresarDetalleTarea(int $id_asignacion) {
        return;
    }

}
