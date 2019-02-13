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
        foreach ($muebles as $mueble) {
            $mueble->bien_control_administrativo;
            $mueble->bien_control_administrativo->bien;
        }

        return $muebles->toJSON(JSON_PRETTY_PRINT);
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
    {dd($request);
        DB::transaction(function () use ($request) {

            $bien = new \App\Bien();
            $bien->nombre = $request->input('nombre');
            $bien->descripcion = $request->input('descripcion');
            $bien->clase = $request->input('clase');
            $bien->id_ubicacion = $request->input('id_ubicacion');
            $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
            $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
            $bien->imagen = $request->input('imagen');
            $bien->observaciones = $request->input('observaciones');
            $bien->valor = $request->input('valor');

            $bca = new \App\BienControlAdministrativo();
            $bca->codigo = $request->input('codigo');
            $bca->periodo_de_garantia = $request->input('periodo_de_garantia');
            $bca->estado = $request->input('estado');
            $bca->caducidad = $request->input('caducidad');
            $bca->peligrosidad = $request->input('peligrosidad');
            $bca->manejo_especial = $request->input('manejo_especial');
            $bca->vida_util = $request->input('vida_util');
            $bca->id_actividad = $request->input('id_actividad');
            $bca->en_uso = ($request->input('en_uso') == 'checked' ? 1 : 0);


            $mueble = new \App\Mueble();
            $mueble->id_tipo_de_bien = $request->input('id_tipo_de_bien');
            $mueble->color = $request->input('color');
            $mueble->dimensiones = $request->input('dimensiones');

            try {
                $bien->save();
                \App\Bien::find($bien->id)->bien_control_administrativo()->save($bca);
                \App\BienControlAdministrativo::find($bca->id)->mueble()->save($mueble);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

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
        $mueble->bien_control_administrativo;
        $mueble->bien_control_administrativo->bien;

        return $mueble->toJSON(JSON_PRETTY_PRINT);
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        // el tipo de bien se debe pasar a la vista para que se agregen los campos
        // especificos al tipo de bien
        $tipo_de_bien = 'muebles';
        // obtencion del mueble a editar
        $mueble = \App\Mueble::find($id);
        // obtencion una referencia al bca asociado con este mueble
        $bca = $mueble->bien_control_administrativo;
        //obtenciono de una referencia al bien asociado con este mueble
        $bien = $bca->bien;

        // se une los datos del bien y del bca en un solo elemento bien
        $bca = $bca->toArray();
        $bien = $bien->toArray();
        $bien = array_merge($bien, $bca);

        // se pasan los siguientes datos a la vista: un string $tipo_de_bien,
        // un objeto $bien, un objeto $mueble, el $id del mueble
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

        $bca = $mueble->bien_control_administrativo;
        $bca->codigo = $request->input('codigo');
        $bca->periodo_de_garantia = $request->input('periodo_de_garantia');
        $bca->estado = $request->input('estado');
        $bca->caducidad = $request->input('caducidad');
        $bca->peligrosidad = $request->input('peligrosidad');
        $bca->manejo_especial = $request->input('manejo_especial');
        $bca->vida_util = $request->input('vida_util');
        $bca->id_actividad = $request->input('id_actividad');
        $bca->en_uso = ($request->input('en_uso') == 'checked' ? 1 : 0);

        $bien = $bca->bien;
        $bien->nombre = $request->input('nombre');
        $bien->descripcion = $request->input('descripcion');
        $bien->clase = $request->input('clase');
        $bien->id_ubicacion = $request->input('id_ubicacion');
        $bien->id_usuario_final = $request->input('id_usuario_final');
        $bien->id_responsable = $request->input('id_responsable');
        $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
        $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
        $bien->imagen = $request->input('imagen');
        $bien->observaciones = $request->input('observaciones');
        $bien->valor = $request->input('valor');

        DB::transaction(function () use ($mueble, $bca, $bien) {
            $mueble->save();
            $bca->save();
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
