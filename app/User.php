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
        'name', 'email', 'password', 'patern', 'matern', 'gender' ,
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

    public function fullName() { 
        return $this->name . ' ' . $this->patern . ' ' . $this->matern;
    }

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
        return $this->hasOne('App\MedicalData', 'id', 'medical_data_id')->withDefault(function ($medical) {
            $medical->id = '';            
        });
    
    }

    public function expedient()
    {
        return $this->hasOne('App\Expedient', 'id', 'expedient_id');
    }

    public function born()
    {
        return $this->hasOne('App\BornExpedient', 'id', 'born_expedient_id');
    }

    public function allergies()
    {
        return $this->hasMany('App\Allergy', 'user_id', 'id');
    }

    public function weights()
    {
        return $this->hasMany('App\Weight', 'user_id', 'id');
    }

    

    public function userTypeView() {
        if($this->user_type == 1) {
            return 'Paciente';
        } else if($this->user_type == 2) {
            return 'Enfermera';
        } else if($this->user_type == 3) {
            return 'Doctor';
        }else if($this->user_type == 4) {
            return 'Administrador';
        }

    }
    public function genderView() {
         if($this->gender == 1) {
             return 'Masculino';
         } else if($this->gender == 2) {
             return 'Femenino';
         }

         return null;
    }
}
