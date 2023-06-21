<?php

namespace App\Http\Requests\API\V1\Package;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'package_description' => 'required',
            'weight' => 'required|numeric',
            'size' => 'required|max:255',
            'package_value' => 'required|numeric',
            'estimated_delivery_date' => 'required|date',
            'creation_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
    }
}
