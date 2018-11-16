<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    // nombre de la tabla real a mapear
    protected $table = 'bienes';

    public function mueble()
    {
        return $this->hasOne('App\Mueble', 'id_bien');
    }

}
