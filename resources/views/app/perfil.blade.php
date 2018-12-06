@extends('layouts.aplication')

@section('title', 'MI PERFIL') 

@section('content')




    <h1>{{ $user->fullName() }}</h1>

    <div class="flex">

        <div>
            <label class="label"> Nombre:</label>
            <p>{{$user->name}}</p>
        </div>

        <div>
            <label class="label">Apellido Paterno:</label>
            <p>{{$user->patern}}</p>
        </div>

        <div>
            <label class="label"> Apellido Materno:</label>
            <p>{{$user->matern}}</p>
        </div>

        <div>
            <label class="label">Sexo:</label>
            <p>{{$user->genderView()}}</p>
        </div>

        <div>
            <label class="label">Tipo de Usuario:</label>
            <p>{{$user->userTypeView()}}</p>
        </div>

        

    </div>

    <h4>Datos Personales</h4>

    <div class="flex">

        <div>
            <label class="label">Correo:</label>
            <p>{{$user->email}}</p>
        </div>

        <div>
            <label class="label">Teléfono:</label>
            <p>{{$user->personal->phone}}</p>
        </div>

        <div>
            <label class="label">Teléfono 2:</label>
            <p>{{$user->personal->phone2}}</p>
        </div>

        <div>
            <label class="label">CURP:</label>
            <p>{{$user->personal->CURP}}</p>
        </div>

        <div>
            <label class="label">Estado Civil:</label>
            <p>{{$user->personal->civil_status}}</p>
        </div>

        <div>
            <label class="label">Ocupación:</label>
            <p>{{$user->personal->occupation}}</p>
        </div>

        <div>
            <label class="label">Religión:</label>
            <p>{{$user->personal->religion}}</p>
        </div>

        <div>
            <label class="label">Nivel Economico:</label>
            <p>{{$user->personal->economic_level}}</p>
        </div>

    </div>

    <h4>Dirección</h4>
    <p>{{ $user->address->allAd() }}</p>
    
        
@endsection