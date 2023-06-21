<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'customer_id',
        'package_description',
        'weight',
        'size',
        'package_value',
        'estimated_delivery_date',
        'creation_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
