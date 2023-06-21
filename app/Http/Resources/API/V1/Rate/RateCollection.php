<?php

namespace App\Http\Resources\API\V1\Rate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RateCollection extends ResourceCollection
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
            'type' => 'Rates',
        ];
    }
}
