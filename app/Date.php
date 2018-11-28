<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = [
        'user_id', 'medic_id', 'date', 'hour', 'time', 'room'

    ];
}
