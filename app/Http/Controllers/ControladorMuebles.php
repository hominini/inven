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
        $muebles = \App\Mueble::find($id);
        return $muebles;
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
        return view('bienes.muebles.editar', compact('mueble'));
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

        $mueble->id_ubicacion = $request->input('id_ubicacion');
        $mueble->nombre = $request->input('nombre');
        $mueble->clase = $request->input('clase');
        $mueble->codigo = $request->input('codigo');
        $mueble->id_usuario_final = $request->input('id_usuario_final');
        $mueble->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
        $mueble->acta_de_recepcion = $request->input('acta_de_recepcion');
        $mueble->id_responsable = $request->input('id_responsable');
        $mueble->periodo_de_garantia = $request->input('periodo_de_garantia');
        $mueble->estado = $request->input('estado');
        $mueble->imagen = $request->input('imagen');
        $mueble->observaciones = $request->input('observaciones');
        $mueble->fecha_de_caducidad = $request->input('fecha_de_caducidad');
        $mueble->peligrosidad = $request->input('peligrosidad');
        $mueble->manejo_especial = $request->input('manejo_especial');
        $mueble->valor_unitario = $request->input('valor_unitario');
        $mueble->tiempo_de_vida_util = $request->input('tiempo_de_vida_util');
        $mueble->id_actividad = $request->input('id_actividad');
        $mueble->en_uso = $request->input('en_uso');
        $mueble->descripcion = $request->input('descripcion');

        $mueble->save();
    }

    /**
     * Elimina el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destruir($id)
    {
        $mueble = \App\Mueble::find($id);
        $mueble->delete();
        return response('Hello World', 200)
                 ->header('Content-Type', 'text/plain');
    }
}
