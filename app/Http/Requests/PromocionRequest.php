<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromocionRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombre_representante' => ['nullable'],
            'nombre_empresa' => ['required'],
            'fecha_inicio' => ['required'],
            'fecha_fin' => ['required'],
            'monto' => ['required'],
            'telefono' => ['nullable']
        ];
    }
}
