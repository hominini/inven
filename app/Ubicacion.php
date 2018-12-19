<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    // nombre de la tabla a mapear
    protected $table = 'ubicaciones';

    public function bienes()
    {
        // laravel determina el id foraneo a partir del nombre del modelo pasandole a 
        // minusculas y le agrega el sufijo _id por lo cual se agrega manualmente
        // id_ubicacion aqui.
        return $this->hasMany('App\Bien', 'id_ubicacion');
    }

}
