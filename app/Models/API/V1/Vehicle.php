<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'vehicle_type',
        'brand',
        'model',
        'year',
        'cargo_capacity',
        'vehicle_status',
        'acquisition_date',
        'route_id'
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
