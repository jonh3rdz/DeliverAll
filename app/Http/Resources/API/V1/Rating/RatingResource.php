<?php

namespace App\Http\Resources\API\V1\Rating;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package_id' => $this->package_id,
            'customer_id' => $this->customer_id,
            'score' => $this->score,
            'comment' => $this->comment,
            'creation_date' => $this->creation_date,
        ];
    }
}
