<?php

namespace App\Http\Resources\API\V1\Vehicle;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'vehicle_type' => $this->vehicle_type,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'cargo_capacity' => $this->cargo_capacity,
            'vehicle_status' => $this->vehicle_status,
            'acquisition_date' => $this->acquisition_date,
            'route_id' => $this->route_id,
        ];
    }
}
