<?php

namespace App\Http\Resources\API\V1\LabelGenerator;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LabelGeneratorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'Group' => 'DeliverAll',
                'Authors' => [
                    'Jonathan'
                ],
            ],
            'type' => 'LabelGenerators'
        ];
    }
}
