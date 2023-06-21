<?php

namespace App\Http\Resources\API\V1\RealTimeTracking;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RealTimeTrackingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
