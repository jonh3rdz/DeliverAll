<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessagingIntegrator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'configurations',
    ];
}
