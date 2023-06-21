<?php

namespace App\Http\Resources\API\V1\Rate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'zone' => $this->zone,
            'distance_range_start' => $this->distance_range_start,
            'distance_range_end' => $this->distance_range_end,
            'rate_amount' => $this->rate_amount,
            'currency' => $this->currency,
            'shipping_type' => $this->shipping_type,
            'validity_date' => $this->validity_date,
        ];
    }
}
