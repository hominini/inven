<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    // nombre de la tabla a mapear
    protected $table = 'muebles';
    // no utilizar timestamps para este modelo
    public $timestamps = false;

    public function bien()
    {
        return $this->belongsTo('App\Bien', 'id_bien');
    }

}
