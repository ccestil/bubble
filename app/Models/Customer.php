<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    //

    protected $fillable = [
        'user_id',

    ];

    public function transactions(): HasMany  // A customer can make many transactions
    {

        return $this->hasMany(Transaction::class);

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
