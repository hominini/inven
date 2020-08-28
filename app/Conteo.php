<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteo extends Model
{
    //
    public function asignacion_tarea()
    {
        return $this->belongsTo('App\AsignacionTarea', 'id_asignacion_tarea');
    }
}
