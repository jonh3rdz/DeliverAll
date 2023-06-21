<?php

namespace App\Http\Resources\API\V1\ReportGenerators;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportGeneratorsCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'report_type' => $this->report_type,
            'generation_date' => $this->generation_date,
        ];
    }
}
