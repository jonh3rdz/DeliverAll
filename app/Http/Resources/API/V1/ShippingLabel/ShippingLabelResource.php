<?php

namespace App\Http\Resources\API\V1\ShippingLabel;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingLabelResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package_id' => $this->package_id,
            'label_content' => $this->label_content,
        ];
    }
}
