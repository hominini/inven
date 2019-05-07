<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControladorUsuariosFinales extends Controller
{
    /**
     * Muestra un listado del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indice()
    {
        $uf = \App\UsuarioFinal::all();

        return $uf;
    }

    /**
     * Muestra el formulario para la creacion de un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('usuarios_finales.crear');
    }

    /**
     * Almacena un recurso recien creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function almacenar(Request $request)
    {
        $uf = new \App\UsuarioFinal();
        $uf->documento_identificacion = $request->input('documento_identificacion');
        $uf->nombre = $request->input('nombre');
        $uf->apellidos = $request->input('apellidos');

        try {
            $uf->save();
            $id = $uf->id;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $uf;
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $usuario_final = \App\UsuarioFinal::find($id);

        return $usuario_final->toJSON(JSON_PRETTY_PRINT);
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
        $usuario_final = \App\UsuarioFinal::find($id);
        // Por medio de compac() se pasa variables a la vista
        return view('usuarios_finales.editar', compact('id', 'usuario_final'));
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
        $usuario_final = \App\UsuarioFinal::find($id);
        $usuario_final->nombre = $request->input('nombre');
        $usuario_final->nombre_cuarto = $request->input('nombre_cuarto');
        $usuario_final->comentarios = $request->input('comentarios');

        $usuario_final->save();

        return redirect()->action(
            'Controladorusuarios_finales@mostrar', ['usuario_final' => $id]
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
        $usuario_final = \App\UsuarioFinal::find($id);

        $usuario_final->delete();


        return response('Hello World', 200)
                 ->header('Content-Type', 'text/plain');
    }
}
