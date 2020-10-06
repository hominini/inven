<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoBaja extends Model
{
    public function asignacion_tarea()
    {
        return $this->belongsTo('App\AsignacionTarea', 'id_asignacion_tarea');
    }

    public function bien()
    {
        return $this->belongsTo('App\Bien', 'id_bien');
    }
}
