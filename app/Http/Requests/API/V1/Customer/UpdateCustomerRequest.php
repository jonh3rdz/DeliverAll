<?php

namespace App\Http\Requests\API\V1\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'registration_date' => 'required|date',
            'client_type' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
    }
}
