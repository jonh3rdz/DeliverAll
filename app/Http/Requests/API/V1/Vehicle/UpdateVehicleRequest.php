<?php

namespace App\Http\Requests\API\V1\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'vehicle_type' => 'required|max:255',
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required|integer',
            'cargo_capacity' => 'required|max:255',
            'vehicle_status' => 'required|max:255',
            'acquisition_date' => 'required|date',
            'route_id' => 'required|exists:routes,id',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
    }
}
