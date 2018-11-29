<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expedient extends Model
{
    protected $fillable = [
        'medic_id', 'height', 'weight', 'blood_type',
        'antecedentes_heredo_familiares', 'antecedentes_personales_patologicos', 
        'antecentes_personales_no_patologicos', 'padecimientos_actuales'
    ];
}
