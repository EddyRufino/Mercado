<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:240'],
            'email' => ['required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user)
            ],
            'direccion' => ['string', 'nullable', 'max:240'],
            'telefono' => ['string', 'nullable', 'max:9'],
            'dni' => ['string', 'nullable', 'min:8', 'max:8'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }
}
