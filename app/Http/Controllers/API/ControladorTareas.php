<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ControladorTareas extends Controller
{
    public function getTareas(Request $request)
    {
        // $user = Auth::user();
        // $user = $request->user();
        // dd($user);
        $tareas = \App\AsignacionTarea::all();
        return $tareas;
    }
}
