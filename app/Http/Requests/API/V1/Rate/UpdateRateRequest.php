<?php

namespace App\Http\Requests\API\V1\Rate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'zone' => 'required|max:255',
            'distance_range_start' => 'required|numeric',
            'distance_range_end' => 'required|numeric',
            'rate_amount' => 'required|numeric',
            'currency' => 'required|max:255',
            'shipping_type' => 'required|max:255',
            'validity_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
    }
}
