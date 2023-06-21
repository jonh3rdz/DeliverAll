<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = 'trackings';

    protected $fillable = [
        'package_id',
        'registration_date_time',
        'location',
        'package_status',
        'comments',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
