<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'patern', 'matern', 
        'speciality_id', 'user_type', 'address_id', 'personal_data_id', 
        'medical_data_id', 'expedient_id', 'born_expedient_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address()
    {
        return $this->hasOne('App\Address', 'id', 'address_id');
    }

    public function personal()
    {
        return $this->hasOne('App\PersonalData', 'id', 'personal_data_id');
    }

    public function medical()
    {
        return $this->hasOne('App\MedicalData', 'id', 'medical_data_id');
    }

    public function allergies()
    {
        return $this->hasMany('App\Allergy', 'user_id', 'id');
    }

    public function weights()
    {
        return $this->hasMany('App\Weight', 'user_id', 'id');
    }
}
