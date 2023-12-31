<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportGenerator extends Model
{
    use HasFactory;

    protected $table = 'report_generators';

    protected $fillable = [
        'report_type',
        'generation_date',
    ];
}
