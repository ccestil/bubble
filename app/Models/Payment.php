<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    //

    protected $fillable = [

        'transaction_id',
        'payment_amount',
        'payment_method',
        'employee_id'

    ];

    public function transaction(): BelongsTo 
    {
        return $this->belongsTo(Transaction::class);
    }
}
