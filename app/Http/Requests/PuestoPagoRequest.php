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
            'fecha_deuda' => ['nullable'],
            'num_operacion' => ['nullable', 'max:250'],
            'monto_deposito' => ['nullable'],
            'fecha_deposito' => ['nullable'],
            'num_recibo' => ['max:250', 'required'],
            'cant_dia' => ['nullable'],
            'monto_remodelacion' => ['nullable'],
            'monto_constancia' => ['nullable'],
            'monto_agua' => ['nullable'],
            'monto_sisa' => ['nullable'],
            'puesto_id' => ['nullable'],
            'tipo_id' => ['nullable'],
        ];
    }
}
