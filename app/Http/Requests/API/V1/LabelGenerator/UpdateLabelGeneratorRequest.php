<?php

namespace App\Http\Requests\API\V1\LabelGenerator;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabelGeneratorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'configurations' => 'required|json'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'json' => 'El campo :attribute debe ser un JSON válido.',
        ];
    }
}
