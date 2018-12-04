@extends('layouts.aplication')
@section('title', 'Editar Dirección') 

@section('content')
<div id="app">
    
<h1>Editar Dirección de {{ $user->fullName() }} </h1>

@if(Session::has('msj'))
<div class="notification is-success" id="a1">
  <button class="delete" onclick="document.getElementById('a1').remove()"></button>
 {{ Session::get('msj')}}
</div>
@endif

<div class="tabs is-centered">
    <ul>
        <li ><a href="{{ url('app/users/edit/usuario', $user->id) }}">Usuario</a></li>
        <li class="is-active"><a href="{{ url('app/users/edit/direccion', $user->id) }}">Dirección</a></li>
        <li><a href="{{ url('app/users/edit/personal', $user->id) }}">Datos Personales</a></li>
        <li><a href="{{ url('app/users/edit/nacimiento', $user->id) }}">Expediente</a></li>
        <li><a href="{{ url('app/users/edit/expediente', $user->id) }}">Expediente de nacimiento</a></li>

    </ul>
</div>

<form  method="POST" action="" v-on:submit="subForm()">

        {{ csrf_field() }}
        <div class="panel-body">                  

                <div class="control">
                    <label class="label">Calle</label>
                    <input type="text" class="input" name="street"  value="{{$user->address->street }}">
                </div>
    
                <div class="control">
                    <label class="label">Colonia</label>
                    <input class="input" type="text"  name="colony" value="{{ $user->address->colony }}">
                </div>
    
                <div class="control">
                    <label class="label">Ciudad</label>
                    <input class="input" type="text"  name="city" value="{{ $user->address->city }}">
                </div>
    
                <div class="control">
                    <label class="label">Estado</label>
                    <input class="input" type="text" name="state" value="{{ $user->address->state }}"> 
                </div>
    
                <div class="control">
                    <label class="label">Numero</label>
                    <input class="input" type="number" name="house_number" value="{{ $user->address->house_number }}"> 
                </div>
    
                <div class="control">
                    <label class="label">Numero Interior</label>
                    <input class="input" type="number" name="house_number_int" value="{{ $user->address->house_number_int }}"> 
                </div>
    
                <div class="control">
                    <label class="label">Codigo Postal</label>
                    <input class="input" type="number" name="CP" value="{{ $user->address->CP }}"> 
                </div>
                
            </div> 
            <br>
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
            
            // user_type: {{ $user->user_type}},
            // cedula: null,
            // blood_type: "{{$user->born->blood_type }}",
            // sub_speciality: null,
            // // gender: {{ $user->gender }},
            // llanto_inmediato: {{ $user->born->llanto_inmediato }},
            // tipo_nacimiento: {{$user->born->tipo_nacimiento }},
            // sangre_criogena_cordon: {{ $user->born->sangre_criogena_cordon }},                       

        
        });
    
    </script>
@endsection