<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioFinal extends Model
{
    // nombre de la tabla a mapear
    protected $table = 'usuarios_finales';
    // no utilizar timestamps para este modelo
    public $timestamps = false;

    public function bienes()
    {
        return $this->belongsToMany('App\Bien', 'asignaciones', 'id_usuario_final', 'id_bien');
    }

}
