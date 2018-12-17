<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BienControlAdministrativo extends Model
{
    // nombre de la tabla real a mapear
    protected $table = 'bienes_control_administrativo';

    public $timestamps = false;

    public function bien()
    {
        return $this->belongsTo('App\Bien', 'id_bien');
    }

    public function mueble()
    {
        return $this->hasOne('App\Mueble', 'id_bien_control_administrativo');
    }

}
