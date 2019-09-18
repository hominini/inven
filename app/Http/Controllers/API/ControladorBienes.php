<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Product;
use Validator;

class ControladorBienes extends Controller
{
    public function traerBienesPorUbicacion($id_ubicacion)
    {
        $bienes = \App\Ubicacion::find($id_ubicacion)->bienes;
        return $bienes;
    }

     /**
     * Almacena un recurso recien creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'clase' => 'required',
        ]);

        $bien = new \App\Bien();
        $bien->nombre = $request->input('nombre');
        $bien->descripcion = $request->input('descripcion');
        $bien->clase = $request->input('clase');
        $bien->id_ubicacion = $request->input('id_ubicacion');
        $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
        $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
        $bien->imagen = $request->input('imagen');
        $bien->observaciones = $request->input('observaciones');
        $bien->valor = $request->input('valor_unitario');

        $bien->save();

        return response()->json([
            'message' => 'Successfully creado bienes'
        ]);
    }
}
