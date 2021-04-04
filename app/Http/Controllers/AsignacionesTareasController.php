<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AsignacionTarea;
use App\Bien;

class AsignacionesTareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $asignaciones_tareas = DB::table('asignaciones_tareas')->where('id_usuario', '=', 1)->get();

        $user = auth()->user();
        if ($user->es_administrador){
            $asignaciones_tareas = \App\AsignacionTarea::all();
        } else {
            $asignaciones_tareas = AsignacionTarea::where('id_usuario', $user->id)
            ->get();
        }


        return view('asignaciones-tareas.index', compact('asignaciones_tareas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = \App\User::all();
        $ubicaciones = \App\Ubicacion::all();
        $tipos = [
            'REGISTRO',
            'CONTEO',
            'BAJAS',
        ];
        return view('asignaciones-tareas.create', compact('usuarios', 'ubicaciones', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $asignacion_tarea = new \App\AsignacionTarea();
            $asignacion_tarea->id_usuario = $request->input('id_usuario');
            $asignacion_tarea->id_ubicacion = $request->input('id_ubicacion');
            $asignacion_tarea->descripcion = $request->input('descripcion');
            $asignacion_tarea->observaciones = $request->input('observaciones');
            $asignacion_tarea->tipo = $request->input('tipo');
            $asignacion_tarea->completada = $request->input('completada') == null ? 0 : 1;
            $asignacion_tarea->fecha_asignacion = $request->input('fecha_asignacion');

            try {

                $asignacion_tarea->save();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        });

        return redirect()->route('asignacionesTareas.index')
                        ->with('success','Registro creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignacion_tarea = \App\AsignacionTarea::find($id);

        return view('asignaciones-tareas.show', compact('asignacion_tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignacion_tarea = \App\AsignacionTarea::find($id);
        $usuarios = \App\User::all();
        $ubicaciones = \App\Ubicacion::all();
        $tipos = [
            'REGISTRO',
            'CONTEO',
            'BAJAS',
        ];
        return view('asignaciones-tareas.edit', compact(
            'asignacion_tarea',
            'usuarios',
            'ubicaciones',
            'tipos')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $asignacion_tarea = \App\AsignacionTarea::find($id);
            $asignacion_tarea->id_usuario = $request->input('id_usuario');
            $asignacion_tarea->id_ubicacion = $request->input('id_ubicacion');
            $asignacion_tarea->descripcion = $request->input('descripcion');
            $asignacion_tarea->observaciones = $request->input('observaciones');
            $asignacion_tarea->completada = $request->input('completada') == null ? 0 : 1;
            $asignacion_tarea->tipo = $request->input('tipo');
            $asignacion_tarea->fecha_asignacion = $request->input('fecha_asignacion');

            try {
                $asignacion_tarea->save();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        });

        return redirect()->route('asignacionesTareas.index')
                        ->with('success','Registro actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // obtencion de referencias a las tablas a eliminar
        $asignacion_tarea = \App\AsignacionTarea::find($id);

        $asignacion_tarea->delete();

        return redirect()->route('asignacionesTareas.index')
                        ->with('success','Registro eliminado con exito.');
    }

    public function indice_conteo(){
        $conteos = \App\Conteo::all();
        
        return view('conteo.index', compact('conteos'));
    }

    public function mostrar_conteo($id){

        $conteo = \App\Conteo::find($id);

        $n_bienes_ubic = Bien::where('id_ubicacion', $conteo->asignacion_tarea->id_ubicacion)->count();

        $id_usuario = $conteo->asignacion_tarea->id_usuario;

        $usuario = \App\User::find($id_usuario);

        return view('conteo.ver',compact(
            'conteo',
            'usuario',
            'n_bienes_ubic'
        ));
    }

    public function indice_bajas(){
        $bajas = \App\Baja::all();

        foreach($bajas as $b){
            // dd($b->asignacion_tarea);
            $tipo = $b->asignacion_tarea->tipo;
            $id = $b->id;
            if($tipo=='BAJAS'){
                $bajas->forget($id);
            }
        }

        return view('bajas.index', compact('bajas'));
    }

    public function mostrar_bajas($id){

        $baja = \App\Baja::find($id);
        $id_usuario = $baja->asignacion_tarea->id_usuario;

        $usuario = \App\User::find($id_usuario);

        $ids = $baja->options;
        $ids =  json_decode($ids);
        $bienes = [];

        foreach ($ids as $id){
            array_push($bienes, \App\Bien::find($id));

        }
        // dd($bienes);


        return view('bajas.ver',compact('baja', 'usuario', 'bienes'));
    }

    public function indice_registros(){
        $registros = \App\Registro::all();

        foreach($registros as $r){
            // dd($r->asignacion_tarea);
            $tipo = $r->asignacion_tarea->tipo;
            $id = $r->id;
            // if($tipo=='REGISTRO'){
            //     $registros->forget($id);
            // }
        }

        return view('registro.index', compact('registros'));
    }

    public function mostrar_registros($id){

        $registro = \App\Registro::find($id);
        $id_usuario = $registro->asignacion_tarea->id_usuario;

        $usuario = \App\User::find($id_usuario);

        $bienes = $registro->options;
        $bienes =  json_decode($bienes);
        // dd($bienes);

        // foreach ($bienes as $id){
        //     array_push($bienes, \App\Registro::find($id));

        // }


        return view('registro.ver',compact('registro', 'usuario', 'bienes'));
    }
}
