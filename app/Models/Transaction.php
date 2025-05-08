<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

    class Transaction extends Model
    {
        //
        protected $fillable = [

            'customer_id',
            'service_id',
            'employee_id',
            'weight',
            'total_amount',
            'payment_status',
            'laundry_status'// and this

        ];

    public function customer(): BelongsTo  // one transaction belongs to one customer.
    {
        
        return $this->belongsTo(Customer::class);
    }

    public function service(): BelongsTo  // One transaction uses one service.
    {
        
        return $this->belongsTo(Service::class);
    }

    public function employee(): BelongsTo  // One transaction is handled by one employee.
    {
        
        return $this->belongsTo(Employee::class);
    }

    public function payment(): HasOne  // One transaction has one payment record
    {
        
        return $this->hasOne(Payment::class);
    }
}
