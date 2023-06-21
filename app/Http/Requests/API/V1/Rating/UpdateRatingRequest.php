<?php

namespace App\Http\Requests\API\V1\Rating;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRatingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'package_id' => 'required|exists:packages,id',
            'customer_id' => 'required|exists:customers,id',
            'score' => 'required|integer',
            'comment' => 'nullable|string',
            'creation_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
    }
}
