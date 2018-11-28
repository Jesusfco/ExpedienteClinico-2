<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    protected $fillable = [
        'phone', 'phone2', 'nacionality', 'birthday', 'CURP', 'civil_status', 'occupation',
        'religion', 'economic_level'

    ];
}
