<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControladorUbicaciones extends Controller
{
    /**
     * Muestra un listado del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indice()
    {
        $ubicaciones = \App\Ubicacion::all();

        return $ubicaciones->toJSON(JSON_PRETTY_PRINT);
    }

    /**
     * Muestra el formulario para la creacion de un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('ubicaciones.crear');
    }

    /**
     * Almacena un recurso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function almacenar(Request $request)
    {
        $ubicacion = new \App\Ubicacion();
        $ubicacion->nombre = $request->input('nombre');
        $ubicacion->nombre_cuarto = $request->input('nombre_cuarto');
        $ubicacion->comentarios = $request->input('comentarios');

        try {
            $ubicacion->save();
            $id = $ubicacion->id;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $ubicacion;
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $ubicacion = \App\Ubicacion::find($id);

        return $ubicacion->toJSON(JSON_PRETTY_PRINT);
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        // Encontrar el recurso a editar por medio del id pasado en la peticion http
        $ubicacion = \App\Ubicacion::find($id);
        // Por medio de compac() se pasa variables a la vista
        return view('ubicaciones.editar', compact('id', 'ubicacion'));
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
        $ubicacion = \App\Ubicacion::find($id);
        $ubicacion->nombre = $request->input('nombre');
        $ubicacion->nombre_cuarto = $request->input('nombre_cuarto');
        $ubicacion->comentarios = $request->input('comentarios');

        $ubicacion->save();

        return redirect()->action(
            'ControladorUbicaciones@mostrar', ['ubicacion' => $id]
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
        $ubicacion = \App\Ubicacion::find($id);

        $ubicacion->delete();


        return response('Hello World', 200)
                 ->header('Content-Type', 'text/plain');
    }
}
