<?php

namespace App\Http\Resources\API\V1\Notification;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'Group' => 'DelieverAll',
                'Authors' => [
                    'Jonathan'
                ],
            ],
            'type' => 'Notifications'
        ];
    }
}
