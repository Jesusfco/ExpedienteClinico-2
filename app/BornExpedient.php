<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BornExpedient extends Model
{
    protected $fillable = [
        'edad_madre', 'llanto_inmediato', 'tipo_nacimiento', 'APGAR',
        'malformaciones', 'sangre_criogena_cordon', 'peso', 'talla',
        'complicaciones_embarazo', 'no_embarazo'
    ];
}
