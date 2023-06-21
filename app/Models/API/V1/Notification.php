<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'message',
        'sending_date_time',
        'read_status',
        'notification_type',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
