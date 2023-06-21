<?php

namespace App\Http\Resources\API\V1\PendingPayment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PendingPaymentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'pending_amount' => $this->pending_amount,
            'due_date' => $this->due_date,
            'payment_status' => $this->payment_status,
        ];
    }
}
