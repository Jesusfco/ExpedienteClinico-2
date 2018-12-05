<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = [
        'user_id', 'medic_id', 'date', 'hour', 'time', 'room'

    ];

    public function medic()
    {
        return $this->hasOne('App\User', 'id', 'medic_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
