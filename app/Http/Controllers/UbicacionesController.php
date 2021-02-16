<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Validator;



class UbicacionesController extends Controller
{
    /**
     * Muestra un listado del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indice()
    {
        $ubicaciones = \App\Ubicacion::all();
        // dd($ubicaciones);
        return view('ubicaciones.index', compact('ubicaciones'));

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

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'nombre_edificio' => 'required',
        ]);



        if ($validator->passes()) {
            $ubicacion = new \App\Ubicacion();
            $ubicacion->nombre = $request->input('nombre');
            $ubicacion->nombre_edificio = $request->input('nombre_edificio');
            $ubicacion->nombre_cuarto = $request->input('nombre_cuarto');
            $ubicacion->comentarios = $request->input('comentarios');

            try {
                $ubicacion->save();
                $id = $ubicacion->id;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }


			return response()->json(['success'=>'Added new records.']);
        }


    	return response()->json(['error'=>$validator->errors()->all()]);
        // return redirect()->route('rutas.index')
        // ->with('success','Registro creado con exito.');
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

        return view('ubicaciones.mostrar', ['ubic'=> $ubicacion]);
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

        return redirect()->route('rutas.index')
        ->with('success','Registro eliminado con exito.');
        ;
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


        return redirect()->route('rutas.index')
        ->with('success','Registro eliminado con exito.');
    }

    public function exportar()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }
}
