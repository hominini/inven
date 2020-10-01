<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use \App\MotivoBaja;

class MotivoBajaController extends Controller
{
    public function index()
    {
        $bajas = MotivoBaja::all();

        return view('bajas.motivos-bajas.index', compact('bajas'));
    }

    public function show($id)
    {
        $baja = MotivoBaja::find($id);

        $id_usuario = $baja->asignacion_tarea->id_usuario;

        $url = Storage::url($baja->ruta_imagen);

        $usuario = \App\User::find($id_usuario);
        // dd($url);
        return view('bajas.motivos-bajas.show', compact('baja', 'usuario', 'url'));
    }
}
