@extends('layouts.aplication')
@section('title', 'Editar Datos Personales') 

@section('content')
<div id="app">
    
<h1>Editar Datos Personales de {{ $user->fullName() }} </h1>

@if(Session::has('msj'))
<div class="notification is-success" id="a1">
  <button class="delete" onclick="document.getElementById('a1').remove()"></button>
 {{ Session::get('msj')}}
</div>
@endif

<div class="tabs is-centered">
    <ul>
        <li ><a href="{{ url('app/users/edit/usuario', $user->id) }}">Usuario</a></li>
        <li><a href="{{ url('app/users/edit/direccion', $user->id) }}">Dirección</a></li>
        <li class="is-active"><a href="{{ url('app/users/edit/personal', $user->id) }}">Datos Personales</a></li>
        
        @if($user->user_type == 1)
        <li><a href="{{ url('app/users/alergias/' . $user->id ) }}">Alergias</a></li>
        <li><a href="{{ url('app/users/edit/expediente', $user->id) }}">Expediente</a></li>
        <li><a href="{{ url('app/users/edit/nacimiento', $user->id) }}">Expediente de nacimiento</a></li>
        @endif
    
    </ul>
</div>

<form  method="POST" action="" v-on:submit="subForm()">

    {{ csrf_field() }}
    <div class="control">
            <label class="label">Teléfono 1</label>
            <input type="phone" class="input" name="phone"  value="{{$user->personal->phone }}">
        </div>

        <div class="control">
            <label class="label">Teléfono 2</label>
            <input class="input" type="phone"  name="phone2" value="{{ $user->personal->phone2 }}">
        </div>

        <div class="control">
            <label class="label">Nacionalidad</label>
            <input class="input" type="text"  name="nacionality" value="{{ $user->personal->nacionality }}">
        </div>

        <div class="control">
            <label class="label">Fecha de nacimiento</label>
            <input class="input" type="date" name="birthday" value="{{ $user->personal->birthday }}"> 
        </div>

        <div class="control">
            <label class="label">CURP</label>
            <input class="input" type="text" name="CURP" value="{{ $user->personal->CURP }}"> 
        </div>

        <div class="control">
            <label class="label">Estado Civil</label>
            <input class="input" type="text" name="civil_status" value="{{ $user->personal->civil_status }}"> 
        </div>

        <div class="control">
            <label class="label">Ocupación</label>
            <input class="input" type="text" name="occupation" value="{{ $user->personal->occupation }}"> 
        </div>
    

        <div class="control">
            <label class="label">Religión</label>
            <input class="input" type="text" name="religion" value="{{ $user->personal->religion }}"> 
        </div>

        <div class="control">
            <label class="label">Nivel Socioeconómico</label>
            <select class="input" type="number" name="economic_level" value="{{ $user->personal->economic_level }}"> 
                <option value="{{$user->personal->economic_level}}"> {{$user->personal->economic_level}}</option>
                <option value="BAJA">BAJA</option>
                <option value="MEDIA">MEDIA</option>
                <option value="ALTA">ALTA</option>
            </select>
        </div>
    
    <button type="submit" class="button is-success">Editar</button>
    <br>
</form>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    
    const app = new Vue({
        el: '#app',
        

        data: {
            
                             

        
        });
    
    </script>
@endsection