<?php

namespace App\Http\Resources\API\V1\Router;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RouterCollection extends ResourceCollection
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
            'type' => 'Routers'
        ];
    }
}
