<?php

namespace App\Http\Resources\API\V1\Notification;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package_id' => $this->package_id,
            'message' => $this->message,
            'sending_date_time' => $this->sending_date_time,
            'read_status' => $this->read_status,
            'notification_type' => $this->notification_type,
        ];
    }
}
