<?php

namespace App\Http\Controllers;

use App\Bien;
use Illuminate\Http\Request;
use App\DataTables\BienesDataTable;
use App\Mueble;
use Yajra\DataTables\Facades\DataTables;

class ControladorBienes extends Controller
{
    /**
     * Muestra un listado del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indice()
    {
        $bienes = \App\Bien::all();
        return $bienes;
    }

    /**
     * Muestra el formulario para la creacion de un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('bienes.crear');
    }

    /**
     * Almacena un recurso recien creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function almacenar(Request $request)
    {
        $bien = new \App\Bien();
        $bien->id_ubicacion = $request->input('id_ubicacion');
        $bien->nombre = $request->input('nombre');
        $bien->clase = $request->input('clase');
        $bien->codigo = $request->input('codigo');
        $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');

        $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
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
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $bienes = \App\Bien::find($id);
        return $bienes;
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $tipo_de_bien = 'bien';
        $bien = \App\Bien::find($id);
        return view('bienes.editar', compact('bien','tipo_de_bien','id'));
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
        $bien = \App\Bien::find($id);

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
    }

    /**
     * Elimina el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destruir($id)
    {
        $bien = \App\Bien::find($id);
        $bien->delete();
        return response('Hello World', 200)
                 ->header('Content-Type', 'text/plain');
    }

    public function indexDTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Bien::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                           $btn = '
                            <a class="button is-primary" href="' . route('muebles.show', $row->id) . '">Mostrar</a>
                            <a href="javascript:void(0)" class="edit button is-warning">Editar</a>
                            ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('bienes.dt.index');
        // return $data_table->render('bienes.dt.index');
    }
}
