<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanioRequest extends FormRequest
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
            'num_correlativo' => ['nullable', 'required'],
            'fecha' => ['nullable', 'required'],
            'tipo_servicio' => ['nullable', 'required'],
            'monto_taza' => ['nullable'],
            'monto_ducha' => ['nullable'],
            'num_operacion' => ['nullable', 'unique:banios'],
        ];
    }
}
