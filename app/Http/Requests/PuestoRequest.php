<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuestoRequest extends FormRequest
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
            // 'lista_id' => [],
            'cantidad_puesto' => ['required'],
            'medidas' => ['string', 'required', 'max:200'],
            'sisa' => ['string', 'required', 'max:200'],
            'sisa_diaria' => ['string', 'required', 'max:200'],
            'riesgo_exposicion' => ['string', 'nullable', 'max:200'],
            'ubicacion_id' => ['required'],
            'actividad_id' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
