<?php

namespace App\Http\Requests\API\V1\Tracking;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'package_id' => 'required|exists:packages,id',
            'registration_date_time' => 'required|date',
            'location' => 'required|max:255',
            'package_status' => 'required|max:255',
            'comments' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
        ];
    }
}
