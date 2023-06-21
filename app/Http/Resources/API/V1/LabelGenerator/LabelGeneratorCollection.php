<?php

namespace App\Http\Resources\API\V1\LabelGenerator;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LabelGeneratorCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'configurations' => $this->configurations,
        ];
    }
}
