<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = [

        'name',
        'email',
        'password',
        'role_task',
        'work_shift',

    ];
}
