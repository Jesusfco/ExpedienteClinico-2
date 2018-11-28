<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalData extends Model
{
    protected $fillable = [
        'sub_speciality', 'cedula'

    ];
}
