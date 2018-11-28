<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    protected $fillable = [
        'phone', 'phone2', 'nacionality', 'birthday', 'CURP', 'gender', 'civil_status', 'occupation',
        'speciality', 'religion', 'suffering', 'blood_type', 'social_segurity',
        'height', 'economic_level'

    ];
}
