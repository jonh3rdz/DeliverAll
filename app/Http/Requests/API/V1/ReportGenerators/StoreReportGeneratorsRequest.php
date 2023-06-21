<?php

namespace App\Http\Requests\API\V1\ReportGenerators;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportGeneratorsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'report_type' => 'required|max:255',
            'generation_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
    }
}
