<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionTarea extends Model
{
    protected $table = 'asignaciones_tareas';

    public function ubicacion()
    {
        return $this->belongsTo('App\Ubicacion', 'id_ubicacion');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }
}
