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

    public function resultadoTarea()
    {
        return $this->hasOne('App\ResultadoTarea', 'id_asignacion_tarea');
    }

    public function conteo()
    {
        return $this->hasOne('App\Conteo', 'id_asignacion_tarea');
    }
}
