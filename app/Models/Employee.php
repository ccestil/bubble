<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    //

    protected $fillable = [

        'user_id',
        'role_task',
        'work_shift',

    ];


    public function transactions(): HasMany  // One employee can handle many transactions.
    {

        return $this->hasMany(Transaction::class);

    }

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
