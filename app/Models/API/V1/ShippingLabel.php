<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingLabel extends Model
{
    use HasFactory;

    protected $table = 'shipping_labels';

    protected $fillable = [
        'package_id',
        'label_content',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
