<?php

namespace App\Http\Resources\API\V1\Package;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'package_description' => $this->package_description,
            'weight' => $this->weight,
            'size' => $this->size,
            'package_value' => $this->package_value,
            'estimated_delivery_date' => $this->estimated_delivery_date,
            'creation_date' => $this->creation_date,
        ];
    }
}
