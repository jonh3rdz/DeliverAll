<?php

namespace App\Http\Requests\API\V1\Route;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRouteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'router_id' => 'required|exists:routers,id',
            'creation_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
    }
}
