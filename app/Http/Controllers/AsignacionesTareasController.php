<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AsignacionTarea;

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
        $conteos = \App\ResultadoTarea::all();
        return view('conteo.index', compact('conteos'));
    }

    public function mostrar_conteo($id){

        $conteo = \App\ResultadoTarea::find($id);
        $id_usuario = $conteo->asignacion_tarea->id_usuario;

        $usuario = \App\User::find($id_usuario);

        //  dd($usuario_tarea);

        return view('conteo.ver',compact('conteo', 'usuario'));
    }

    public function indice_bajas(){
        $bajas = \App\ResultadoTarea::all();

        foreach($bajas as $b){
            $tipo = $b->asignacion_tarea->tipo;
            $id = $b->id;
            if($tipo=='BAJAS'){
                $bajas->forget($id);
            }
        }
        dd($bajas);

        return view('bajas.index', compact('bajas'));
    }

    public function mostrar_bajas($id){

        $bajas = \App\ResultadoTarea::find($id);
        $id_usuario = $bajas->asignacion_tarea->id_usuario;

        $usuario = \App\User::find($id_usuario);

        //  dd($usuario_tarea);

        return view('bajas.ver',compact('bajas', 'usuario'));
    }
}
