<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuestoPagoRequest extends FormRequest
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
            'num_operacion' => ['nullable', 'max:250'],
            'num_recibo' => ['max:250', 'required', 'unique:pagos'],
            'monto_remodelacion' => ['nullable'],
            'monto_constancia' => ['nullable'],
            'monto_agua' => ['nullable'],
            'monto_sisa' => ['required'],
            'puesto_id' => ['nullable'],
            'tipo_id' => ['nullable'],
        ];
    }
}
