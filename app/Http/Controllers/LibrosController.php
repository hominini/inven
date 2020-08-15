<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBien;
use Illuminate\Support\Facades\DB;

class LibrosController extends Controller
{
    /**
     * Muestra un listado del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indice()
    {
        $librosReturn = [];
        $libros = \App\ItemBibliografico::all();

        foreach ($libros as $libro) {

            $libro->bien_control_administrativo;
            $libro->bien_control_administrativo->bien;
            $libroReturn = $libro->toArray();

            foreach ($libroReturn['bien_control_administrativo'] as $key => $val)
            {
                $libroReturn[$key] = $val;
            }

            foreach ($libroReturn['bien_control_administrativo']['bien'] as $key => $val)
            {
                $libroReturn[$key] = $val;
            }


            unset($libroReturn['bien_control_administrativo']);
            unset($libroReturn['bien']);

            $libroReturn['id'] = $libro->id;
            $libroReturn['ubicacion'] = $libro->bien_control_administrativo->bien->ubicacion;
            array_push($librosReturn, $libroReturn);

        }
        return view('bienes.libros.index', compact('librosReturn'));
    }

    /**
     * Muestra el formulario para la creacion de un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('bienes.libros.crear');
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

        $bt = new \App\ItemBibliografico();
        // $bt->id_tipo_de_bien = $request->input('id_tipo_de_bien');
        $bt->autor = $request->input('autor');
        $bt->detalles_de_publicacion = $request->input('detalles_de_publicacion');

        DB::transaction(function () use ($bt, $bca, $bien) {
            $bien->save();
            \App\Bien::find($bien->id)->bien_control_administrativo()->save($bca);
            \App\BienControlAdministrativo::find($bca->id)->items_bibliografico()->save($bt);

        });
        return redirect()->route('libros.index')
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
        $bien_tecnologico = \App\ItemBibliografico::find($id);

        // dd($libro->bien_control_administrativo);
        return view('bienes.libros.ver', compact('librosReturn'));
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
        $tipo_de_bien = 'libros';
        // obtencion del libro a editar
        $librosReturn = \App\ItemBibliografico::find($id);
        // se obtiene una referencia al bca asociado con este libro
        $bca = $librosReturn->bien_control_administrativo;
        //se obtiene de una referencia al bien asociado con este libro
        $bien = $bca->bien;

        // se une los datos del bien y del bca en un solo elemento bien
        $bca = $bca->toArray();
        $bien = $bien->toArray();
        $bien = array_merge($bien, $bca);

        // se pasan los siguientes datos a la vista: un string $tipo_de_bien,
        // un objeto $bien, un objeto $libro, el $id del libro
        return view('bienes.editar', compact('librosReturn', 'bien', 'tipo_de_bien', 'id'));
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

        $bt = \App\ItemBibliografico::find($id);
        // $bt->id_tipo_de_bien = $request->input('id_tipo_de_bien');
        $bt->autor = $request->input('autor');
        $bt->detalles_de_publicacion = $request->input('detalles_de_publicacion');

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
        return redirect()->route('libros.index')
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
        $librosReturn = \App\ItemBibliografico::find($id);
        $bca = $librosReturn->bien_control_administrativo;
        $bien = $bca->bien;
        $librosReturn->delete();
        $bca->delete();
        $bien->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Registro eliminado con exito.');
    }
}
