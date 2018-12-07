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
        <li><a href="{{ url('app/users/edit/direccion', $user->id) }}">Dirección</a></li>
        <li><a href="{{ url('app/users/edit/personal', $user->id) }}">Datos Personales</a></li>
        @if($user->user_type == 1)
        <li ><a href="{{ url('app/users/alergias/' . $user->id ) }}">Alergias</a></li>
        <li class="is-active"><a href="{{ url('app/users/edit/expediente', $user->id) }}">Expediente</a></li>
        <li><a href="{{ url('app/users/edit/nacimiento', $user->id) }}">Expediente de nacimiento</a></li>
        @endif
    </ul>
</div>
    @if(Auth::user()->user_type == 4)
    <form  method="POST" action="">

            {{ csrf_field() }}
            <div class="panel-body">                  

                    <div class="control">
                            <label class="label">Peso Kg:</label>
                            <input type="number" class="input" name="weight"  value="{{$user->expedient->weight }}">
                        </div>
        
                        <div class="control">
                            <label class="label">Talla cm:</label>
                            <input type="number" class="input" name="height"  value="{{$user->expedient->height }}">
                        </div>
        
                        <div class="field">
                                <label class="label">Tipo de Sangre:</label>
                                <div class="select">
                                    <select type="text" class="input" name="blood_type" v-model="blood_type">
                                        <option>O+</option>
                                        <option>A+</option>
                                        <option>B+</option>
                                        <option>AB+</option>
                                        <option>O-</option>
                                        <option>A-</option>
                                        <option>B-</option>
                                        <option>AB-</option>
                                    </select>
                                </div>
                            </div>
        
                        <div class="control">
                            <label class="label">Antecedentes heredo familiaries:</label>
                            <textarea class="textarea" name="antecedentes_heredo_familiares">{{$user->expedient->antecedentes_heredo_familiares }}
                            </textarea>
                        </div>
        
                        <div class="control">
                            <label class="label">Antecedentes Personales Patologicos:</label>
                            <textarea class="textarea" name="antecedentes_personales_patologicos">{{$user->expedient->antecedentes_personales_patologicos }}
                            </textarea>
                        </div>
        
                        <div class="control">
                            <label class="label">Antecedentes Personales No Patologicos:</label>
                            <textarea class="textarea" name="antecedentes_personales_no_patologicos">{{$user->expedient->antecedentes_personales_no_patologicos }}
                            </textarea>
                        </div>
        
                        <div class="control">
                            <label class="label">Padecimientos Actuales:</label>
                            <textarea class="textarea" name="padecimientos_actuales">{{$user->expedient->padecimientos_actuales }}
                            </textarea>
                        </div>
                <br>
            <button type="submit" class="button is-success">Editar Expediente</button>
            <br>
    </form>
    @else

    <form  method="POST" action="">

            {{ csrf_field() }}
            <div class="panel-body">                  
                <div class="flex">
                    <div class="control">
                            <label class="label">Peso Kg:</label>
                            <input type="number" class="input" name="weight"  value="{{$user->expedient->weight }}" disabled>
                        </div>
        
                        <div class="control">
                            <label class="label">Talla cm:</label>
                            <input type="number" class="input" name="height"  value="{{$user->expedient->height }}" disabled>
                        </div>
        
                        <div class="field">
                                <label class="label">Tipo de Sangre:</label>
                                <div class="select">
                                    <select type="text" class="input" name="blood_type" v-model="blood_type" disabled>
                                        <option>O+</option>
                                        <option>A+</option>
                                        <option>B+</option>
                                        <option>AB+</option>
                                        <option>O-</option>
                                        <option>A-</option>
                                        <option>B-</option>
                                        <option>AB-</option>
                                    </select>
                                </div>
                            </div>
                </div>
                        <div class="control">
                            <label class="label">Antecedentes heredo familiaries:</label>
                            <textarea class="textarea" name="antecedentes_heredo_familiares" disabled>{{$user->expedient->antecedentes_heredo_familiares }}</textarea>
                        </div>
        
                        <div class="control">
                            <label class="label">Antecedentes Personales Patologicos:</label>
                            <textarea class="textarea" name="antecedentes_personales_patologicos" disabled>{{$user->expedient->antecedentes_personales_patologicos }}</textarea>
                        </div>
        
                        <div class="control">
                            <label class="label">Antecedentes Personales No Patologicos:</label>
                            <textarea class="textarea" name="antecedentes_personales_no_patologicos"disabled>{{$user->expedient->antecedentes_personales_no_patologicos }}</textarea>
                        </div>
        
                        <div class="control">
                            <label class="label">Padecimientos Actuales:</label>
                            <textarea class="textarea" name="padecimientos_actuales" disabled>{{$user->expedient->padecimientos_actuales }}</textarea>
                        </div>
                <br>
            
            <br>
    </form>

    @endif

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