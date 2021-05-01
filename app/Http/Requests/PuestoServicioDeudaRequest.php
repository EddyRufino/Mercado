<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuestoServicioDeudaRequest extends FormRequest
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
            'fecha' => ['date', 'required'],
            'num_operacion' => ['nullable'],
            'monto_remodelacion' => ['nullable'],
            'monto_constancia' => ['nullable'],
            'monto_agua' => ['required'],
            'monto_sisa' => ['nullable'],
            'puesto_id' => ['nullable'],
            'tipo_id' => ['nullable'],
        ];
    }
}
