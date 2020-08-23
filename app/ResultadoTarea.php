<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoTarea extends Model
{
    // nombre de la tabla a mapear
    protected $table = 'resultado_tarea';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_hora_inicio',
        'fecha_hora_fin',
    ];

    public function asignacion_tarea()
    {
        return $this->belongsTo('App\AsignacionTarea', 'id_asignacion_tarea');
    }
}
