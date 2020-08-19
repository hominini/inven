<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        //obtener los datos de la peticion
        $id_usuario = $request->id_usuario;
        $num_bienes = $request->numero_de_bienes;
        $id_ubicacion = $request->id_ubicacion;

        //obtener todos los bienes de la ubicacion
        $bienes = \App\Bien::where('id_ubicacion', $id_ubicacion)->get();
        //comparar
        $nb=count($bienes);
        if (abs($nb - $num_bienes) <= 3) {
            return response()->json([
                'message' => 'Su solicitud ha sido enviada correctamente.'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Error'
            ]);
        }
        //guardar en la base de datos el registro

    }

    public function guardarResultadoTarea(Request $request, int $id_asignacion) {
        $resultado_tarea = new \App\ResultadoTarea([
            'fecha_hora_inicio' => $request->input('fecha_hora_inicio'),
            'fecha_hora_fin' => $request->input('fecha_hora_fin')
        ]);
        $asignacion = \App\AsignacionTarea::find($id_asignacion);
        $asignacion->resultadoTarea()->save($resultado_tarea);

        return $resultado_tarea;
    }

    public function actualizarTarea($id){

        DB::transaction(function () use ($id) {

            $asignacion_tarea = \App\AsignacionTarea::find($id);
            $asignacion_tarea->completada = 1;

            try {
                $asignacion_tarea->save();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        });
        return response()->json([
            // 'countingResult' => $dummy_response,
            'message' => 'Su tarea ha sido actualizada correctamente.'
        ]);
    }
}
