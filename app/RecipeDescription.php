<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeDescription extends Model
{
    protected $fillable = [
        'recipe_id', 'medicine', 'frequency', 'contraindications'
    ];
}
