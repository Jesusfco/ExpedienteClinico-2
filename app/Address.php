<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street', 'colony', 'city', 'state', 'house_number', 'house_number_int', 'CP'
    ];
}
