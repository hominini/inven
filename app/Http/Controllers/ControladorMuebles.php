<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControladorMuebles extends Controller
{
    /**
     * Muestra un listado del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indice()
    {
        $muebles = \App\Mueble::all();
        return $muebles;
    }

    /**
     * Muestra el formulario para la creacion de un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('bienes.muebles.crear');
    }

    /**
     * Almacena un recurso recien creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function almacenar(Request $request)
    {
        DB::transaction(function () use ($request) {

            $bien = new \App\Bien();
            $bien->id_ubicacion = $request->input('id_ubicacion');
            $bien->nombre = $request->input('nombre');
            $bien->clase = $request->input('clase');
            $bien->codigo = $request->input('codigo');
            $bien->id_usuario_final = $request->input('id_usuario_final');
            $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
            $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
            $bien->id_responsable = $request->input('id_responsable');
            $bien->periodo_de_garantia = $request->input('periodo_de_garantia');
            $bien->estado = $request->input('estado');
            $bien->imagen = $request->input('imagen');
            $bien->observaciones = $request->input('observaciones');
            $bien->fecha_de_caducidad = $request->input('fecha_de_caducidad');
            $bien->peligrosidad = $request->input('peligrosidad');
            $bien->manejo_especial = $request->input('manejo_especial');
            $bien->valor_unitario = $request->input('valor_unitario');
            $bien->tiempo_de_vida_util = $request->input('tiempo_de_vida_util');
            $bien->id_actividad = $request->input('id_actividad');
            $bien->en_uso = $request->input('en_uso');
            $bien->descripcion = $request->input('descripcion');
            $bien->save();

            $mueble = new \App\Mueble();
            $mueble->id_bien = $bien->id;
            $mueble->id_tipo_de_bien = $request->input('id_tipo_de_bien');
            $mueble->color = $request->input('color');
            $mueble->dimensiones = $request->input('dimensiones');
            $mueble->save();
        });
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $mueble = \App\Mueble::find($id);
        $mueble->bien;
        $mueble->toArray();
        return $mueble;
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $mueble = \App\Mueble::find($id);
        $bien = $mueble->bien;
        $tipo_de_bien = 'muebles';
        return view('bienes.editar', compact('mueble','bien','tipo_de_bien', 'id'));
    }

    /**
     * Actualiza el recurso especificado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $mueble = \App\Mueble::find($id);
        $mueble->id_tipo_de_bien = $request->input('id_tipo_de_bien');
        $mueble->color = $request->input('color');
        $mueble->dimensiones = $request->input('dimensiones');

        $bien = $mueble->bien;
        $bien->id_ubicacion = $request->input('id_ubicacion');
        $bien->nombre = $request->input('nombre');
        $bien->clase = $request->input('clase');
        $bien->codigo = $request->input('codigo');
        $bien->id_usuario_final = $request->input('id_usuario_final');
        $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
        $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
        $bien->id_responsable = $request->input('id_responsable');
        $bien->periodo_de_garantia = $request->input('periodo_de_garantia');
        $bien->estado = $request->input('estado');
        $bien->imagen = $request->input('imagen');
        $bien->observaciones = $request->input('observaciones');
        $bien->fecha_de_caducidad = $request->input('fecha_de_caducidad');
        $bien->peligrosidad = $request->input('peligrosidad');
        $bien->manejo_especial = $request->input('manejo_especial');
        $bien->valor_unitario = $request->input('valor_unitario');
        $bien->tiempo_de_vida_util = $request->input('tiempo_de_vida_util');
        $bien->id_actividad = $request->input('id_actividad');
        $bien->en_uso = $request->input('en_uso') ? 1 : 0;
        $bien->descripcion = $request->input('descripcion');

        DB::transaction(function () use ($bien, $mueble) {
            $mueble->save();
            $bien->save();
        });

        return redirect()->action(
            'ControladorMuebles@mostrar', ['mueble' => $id]
        );
    }

    /**
     * Elimina el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destruir($id)
    {
        // obtencion de referencias a las tablas a eliminar
        $mueble = \App\Mueble::find($id);
        $bca = $mueble->bien_control_administrativo;
        $bien = $mueble->bien_control_administrativo->bien;
        $mueble->delete();
        $bca->delete();
        $bien->delete();

        return response('Hello World', 200)
                 ->header('Content-Type', 'text/plain');
    }
}
