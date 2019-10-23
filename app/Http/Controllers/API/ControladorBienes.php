<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBien;
use Illuminate\Support\Facades\DB;


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
    public function store(StoreBien $request)
    {
  
        $bien = new \App\Bien();
        $bien->nombre = $request->input('nombre');
        $bien->descripcion = $request->input('descripcion');
        $bien->clase = $request->input('clase');
        $bien->id_ubicacion = $request->input('id_ubicacion');
        $bien->observaciones = $request->input('observaciones');
        $bien->valor = $request->input('valor_unitario');
        $bien->codigo_barras = $request->input('codigo');

        $bca = new \App\BienControlAdministrativo();
        $bca->codigo = $request->input('codigo');

        $bien_subtipo = null;
        
        switch ($request->input('tipo_de_bien')) {
            case 'Tecnologicos':
                $bien_subtipo = new \App\BienTecnologico();
                break;
            case 'Muebles':
                $bien_subtipo = new \App\Mueble();
                break;
            case 'Libros':
                $bien_subtipo = new \App\ItemBibliografico();
                break;
        }
        
        DB::transaction(function () use ($bien_subtipo, $bca, $bien) {
            $bien->save();
            \App\Bien::find($bien->id)->bien_control_administrativo()->save($bca);
            \App\BienControlAdministrativo::find($bca->id)->mueble()->save($bien_subtipo);
        });

        return response()->json([
            'message' => 'El bien ha sido registrado.'
        ]);
    }
}
