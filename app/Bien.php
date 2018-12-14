<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    // nombre de la tabla real a mapear
    protected $table = 'bienes';

    public function bien_control_administrativo()
    {
        return $this->hasOne('App\BienControlAdministrativo', 'id_bien');
    }

}
