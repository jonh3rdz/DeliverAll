<?php

namespace App\Http\Requests\API\V1\ShippingLabel;

use Illuminate\Foundation\Http\FormRequest;

class StoreShippingLabelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'package_id' => 'required|exists:packages,id',
            'label_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
        ];
    }
}
