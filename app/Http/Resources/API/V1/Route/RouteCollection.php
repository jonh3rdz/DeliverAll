<?php

namespace App\Http\Resources\API\V1\Route;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RouteCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'Group' => 'DeliverAll',
                'Authors' => [
                    'Jonathan'
                ],
            ],
            'type' => 'Routes'
        ];
    }
}
