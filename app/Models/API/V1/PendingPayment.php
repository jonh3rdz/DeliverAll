<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingPayment extends Model
{
    use HasFactory;

    protected $table = 'pending_payments';

    protected $fillable = [
        'customer_id',
        'pending_amount',
        'due_date',
        'payment_status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
