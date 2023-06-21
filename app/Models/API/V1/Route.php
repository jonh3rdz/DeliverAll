<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $fillable = [
        'name',
        'description',
        'router_id',
        'creation_date'
    ];

    public function router()
    {
        return $this->belongsTo(Router::class);
    }
}
