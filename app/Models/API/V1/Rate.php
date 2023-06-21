<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'rates';

    protected $fillable = [
        'zone',
        'distance_range_start',
        'distance_range_end',
        'rate_amount',
        'currency',
        'shipping_type',
        'validity_date',
    ];
}
