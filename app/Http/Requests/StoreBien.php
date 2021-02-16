<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreBien extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtiene reglas de validación aplicadas a la petición.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'nombre' => 'required',
            'clase' => 'required',
            'id_ubicacion' => 'required',
            'codigo' => 'required',
        ];
    }
}
