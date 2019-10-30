<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBien;
use Illuminate\Support\Facades\DB;

class ControladorBienesTecnologicos extends Controller
{
    /**
     * Muestra un listado del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indice()
    {
        $bienes_tecnologicos = \App\BienTecnologico::all();

        return view('bienes.tecnologicos.index', compact('bienes_tecnologicos'));
    }

    /**
     * Muestra el formulario para la creacion de un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('bienes.tecnologicos.crear');
    }

    /**
     * Almacena un recurso recien creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function almacenar(StoreBien $request)
    {
        $bien = new \App\Bien();
        $bien->nombre = $request->input('nombre');
        $bien->descripcion = $request->input('descripcion');
        $bien->clase = $request->input('clase');
        $bien->id_ubicacion = $request->input('id_ubicacion');
        //$bien->id_usuario_final = $request->input('id_usuario_final');
        $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
        $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
        $bien->imagen = $request->input('imagen');
        $bien->observaciones = $request->input('observaciones');
        $bien->valor = $request->input('valor');
        $bien->codigo_barras = $request->input('codigo');

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

        $bt = new \App\BienTecnologico();
        // $bt->id_tipo_de_bien = $request->input('id_tipo_de_bien');
        $bt->numero_de_serie = $request->input('numero_de_serie');
        $bt->modelo = $request->input('modelo');
        $bt->marca = $request->input('marca');
        $bt->proveedor = $request->input('proveedor');
        $bt->software_asociado = $request->input('software_asociado');

        DB::transaction(function () use ($bt, $bca, $bien) {
            $bien->save();
            \App\Bien::find($bien->id)->bien_control_administrativo()->save($bca);
            \App\BienControlAdministrativo::find($bca->id)->bien_tecnologico()->save($bt);
        });
        return redirect()->route('bienes_tecnologicos.index')
            ->with('success', 'Registro creado con exito.');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $bien_tecnologico = \App\BienTecnologico::find($id);

        // dd($mueble->bien_control_administrativo);
        return view('bienes.tecnologicos.ver', compact('bien_tecnologico'));
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
        $tipo_de_bien = 'tecnologicos';
        // obtencion del mueble a editar
        $bien_tecnologico = \App\BienTecnologico::find($id);
        // se obtiene una referencia al bca asociado con este mueble
        $bca = $bien_tecnologico->bien_control_administrativo;
        //se obtiene de una referencia al bien asociado con este mueble
        $bien = $bca->bien;

        // se une los datos del bien y del bca en un solo elemento bien
        $bca = $bca->toArray();
        $bien = $bien->toArray();
        $bien = array_merge($bien, $bca);

        // se pasan los siguientes datos a la vista: un string $tipo_de_bien,
        // un objeto $bien, un objeto $mueble, el $id del mueble
        return view('bienes.editar', compact('bien_tecnologico', 'bien', 'tipo_de_bien', 'id'));
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
        $bt = \App\BienTecnologico::find($id);
        // $bt->id_tipo_de_bien = $request->input('id_tipo_de_bien');
        $bt->numero_de_serie = $request->input('numero_de_serie');
        $bt->modelo = $request->input('modelo');
        $bt->marca = $request->input('marca');
        $bt->proveedor = $request->input('proveedor');
        $bt->software_asociado = $request->input('software_asociado');

        $bca = $bt->bien_control_administrativo;
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
        //$bien->id_usuario_final = $request->input('id_usuario_final');
        $bien->fecha_de_adquisicion = $request->input('fecha_de_adquisicion');
        $bien->acta_de_recepcion = $request->input('acta_de_recepcion');
        $bien->imagen = $request->input('imagen');
        $bien->observaciones = $request->input('observaciones');
        $bien->valor = $request->input('valor');
        $bien->codigo_barras = $request->input('codigo');

        DB::transaction(function () use ($bt, $bca, $bien) {
            $bt->save();
            $bca->save();
            $bien->save();
        });

        return redirect()->route('bienes_tecnologicos.index')
            ->with('success', 'Registro actualizado con exito.');
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
        $bien_tecnologico = \App\BienTecnologico::find($id);
        $bca = $bien_tecnologico->bien_control_administrativo;
        $bien = $bca->bien;
        $bien_tecnologico->delete();
        $bca->delete();
        $bien->delete();

        return redirect()->route('bienes_tecnologicos.index')
            ->with('success', 'Registro eliminado con exito.');
    }
}
