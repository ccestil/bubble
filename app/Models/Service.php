<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    //

    protected $fillable = [

        'service_name',
        'price_per_kg'

    ];

        public function transactions(): HasMany  // One service can be reused in many transactions.
    {

        return $this->hasMany(Transaction::class);

    }

}
