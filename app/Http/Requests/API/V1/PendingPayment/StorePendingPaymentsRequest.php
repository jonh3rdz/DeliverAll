<?php

namespace App\Http\Requests\API\V1\PendingPayments;

use Illuminate\Foundation\Http\FormRequest;

class StorePendingPaymentsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'pending_amount' => 'required|numeric',
            'due_date' => 'required|date',
            'payment_status' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
        ];
    }
}
