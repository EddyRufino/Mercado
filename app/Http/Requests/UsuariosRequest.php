<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:240'],
            'apellido' => ['required', 'string', 'max:240'],
            'email' => 'required|unique:users,email,'.$this->route('usuario'),
            'direccion' => ['string', 'nullable', 'max:240'],
            'telefono' => ['string', 'nullable', 'max:9'],
            'dni' => ['string', 'nullable', 'min:8', 'max:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
