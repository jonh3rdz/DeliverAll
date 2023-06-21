<?php

namespace App\Http\Requests\API\V1\Notification;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'package_id' => 'required|exists:packages,id',
            'message' => 'required|max:255',
            'sending_date_time' => 'required|date',
            'read_status' => 'nullable|boolean',
            'notification_type' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'boolean' => 'El campo :attribute debe ser verdadero o falso.',
        ];
    }
}
