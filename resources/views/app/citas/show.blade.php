@extends('layouts.aplication')
@section('title', 'Ver Cita') 
@section('content')

<h1>Ver Cita #{{$date->id}}</h1>

    <div class="container is-desktop" >

        
        <div class="field">
            <label>Paciente</label>
            <input class="input" placeholder="Nombre" value="{{ $date->user->fullname() }}"disabled>
        </div>

        <div class="field">
            <label>Medico</label>
            <input class="input" placeholder="Nombre" value="{{ $date->medic->fullname() }}"disabled>
        </div>

        <div class="field">
            <label>Asunto</label>
            <input class="input" placeholder="Nombre" value="{{ $date->subject }}"disabled>
        </div>

        <div class="field">
            <label>Fecha</label>
            <input class="input" placeholder="Nombre" value="{{ $date->date }}"disabled>
        </div>

        <div class="field">
            <label>Hora</label>
            <input class="input" placeholder="Nombre" value="{{ $date->hour }}"disabled>
        </div>

        <div class="field">
            <label>Consultorio:</label>
            <input class="input" placeholder="Nombre" value="{{ $date->room }}"disabled>
        </div>

    </div>
@endsection