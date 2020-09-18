<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Conteo;
use App\Baja;
use App\Bien;
use App\BienControlAdministrativo;
use App\Registro;


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
        // $validatedData = $request->validate([

        // 'id_asignacion_tarea' => 'exists:asignaciones_tareas,id|unique:asignaciones_tareas,id'  ,


        // ]);
        //obtener los datos de la peticion
        $num_bienes = $request->numero_de_bienes;
        $id_ubicacion = $request->id_ubicacion;

        //obtener todos los bienes de la ubicacion
        $bienes = \App\Bien::where('id_ubicacion', $id_ubicacion)->get();
        //comparar
        $nb=count($bienes);
        if (abs($nb - $num_bienes) <= 3) {
             //guardar en la base de datos el registro
            $conteo = new Conteo;
            $conteo->n_bienes = $num_bienes;
            $conteo->id_asignacion_tarea	 = $request->id_asignacion_tarea;

            $conteo->save();

            return response()->json([
                'message' => 'Su solicitud ha sido enviada correctamente.'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Error'
            ]);
        }

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

    public function darBajaBienes(Request $request){

        $ids = $request->input('idsBienes');
        $limite = count($ids);
        for($i=0; $i<$limite; $i++){
            $bien = \App\Bien::find($ids[$i]);
            $bien->is_baja=1;
            $bien->save();

        }

        // dd($ids);
            //guardar en la base de datos el registro
        $res_tarea = new Baja;
        $res_tarea->id_asignacion_tarea	 = $request->id_asignacion_tarea;
        $res_tarea->options	 =  json_encode($ids);

        $res_tarea->save();

        return response()->json([
            'message' => 'Su solicitud ha sido enviada correctamente.'
        ]);
    }

    public function registrarBienes(Request $request){
        // dd($request->bienes[0]['nombre']);
        foreach ($request->bienes as $br){
            // dd($br);
            $bien = new Bien;
            $bien->nombre = $br['nombre'];
            $bien->observaciones = $br['observaciones'];
            $bien->codigo_barras = $br['codigo'];
            $bien->id_ubicacion = $br['idUbicacion'];
            $bien->save();

            $bca = new BienControlAdministrativo;
            $bca->estado = $br['estado'];
            $bien->bien_control_administrativo()->save($bca);

        }

        $registro = new Registro;
        $registro->id_asignacion_tarea	 = $request->idAsignacionTarea;
        $registro->options	 =  json_encode($request->bienes);

        $registro->save();

        return response()->json([
            'message' => 'Su solicitud ha sido enviada correctamente.'
        ]);
    }
}
