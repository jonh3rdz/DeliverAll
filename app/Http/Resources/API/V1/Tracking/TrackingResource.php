<?php

namespace App\Http\Resources\API\V1\Tracking;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package_id' => $this->package_id,
            'registration_date_time' => $this->registration_date_time,
            'location' => $this->location,
            'package_status' => $this->package_status,
            'comments' => $this->comments,
        ];
    }
}
