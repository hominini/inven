<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    // nombre de la tabla a mapear
    protected $table = 'asignaciones';
    // no utilizar timestamps para este modelo
    public $timestamps = false;



}
