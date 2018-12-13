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

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id')->withDefault(function ($user) {
            $user->name = 'Usuario Inexistente';            
        });
    }

    public function medic()
    {
        return $this->hasOne('App\User', 'id', 'medic_id')->withDefault(function ($user) {
            $user->name = 'Usuario Inexistente';   
            $user->patern = '';
            $user->matern = '';
        });
    }
}
