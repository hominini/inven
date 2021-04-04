<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateBien extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        // dd($request->all());
        return [
            'nombre' => 'required',
            'clase' => 'required',
            'id_ubicacion' => 'required',
            'codigo_barras' => [
                'required',
                Rule::unique('bienes')->ignore($request->bien_id),
            ],
        ];
    }
}
