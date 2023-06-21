<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelGenerator extends Model
{
    use HasFactory;

    protected $table = 'label_generators';

    protected $fillable = [
        'configurations'
    ];

    protected $casts = [
        'configurations' => 'json'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
