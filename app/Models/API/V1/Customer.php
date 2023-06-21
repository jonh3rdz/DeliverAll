<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'postal_code',
        'phone',
        'email',
        'registration_date',
        'client_type',
    ];
}
