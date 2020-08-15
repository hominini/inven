<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemBibliografico extends Model
{
    // nombre de la tabla a mapear
    protected $table = 'items_bibliograficos';

    // no utilizar timestamps para este modelo
    public $timestamps = false;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function bien_control_administrativo()
    {
        return $this->belongsTo('App\BienControlAdministrativo', 'id_bien_control_administrativo');
    }

}
