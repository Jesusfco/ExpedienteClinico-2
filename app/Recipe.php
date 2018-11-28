<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'user_id', 'medic_id', 'observation'
    ];

    public function description()
    {
        return $this->hasMany('App\RecipeDescription', 'recipe_id', 'id');
    }
}
