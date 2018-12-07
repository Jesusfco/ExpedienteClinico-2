@extends('layouts.aplication')
@section('title', 'Editar Expediente de Nacimiento') 
@section('content')
<div id="app">
    
<h1>Editar Expediente de Nacimiento de {{ $user->fullName() }} </h1>

<div class="tabs is-centered">
        <ul>
            <li ><a href="{{ url('app/users/edit/usuario', $user->id) }}">Usuario</a></li>
            <li><a href="{{ url('app/users/edit/direccion', $user->id) }}">Dirección</a></li>
            <li><a href="{{ url('app/users/edit/personal', $user->id) }}">Datos Personales</a></li>

            @if($user->user_type == 1)
                <li ><a href="{{ url('app/users/alergias/' . $user->id ) }}">Alergias</a></li>
                <li><a href="{{ url('app/users/edit/expediente', $user->id) }}">Expediente</a></li>
                <li class="is-active"><a href="{{ url('app/users/edit/nacimiento', $user->id) }}">Expediente de nacimiento</a></li>
            @endif
    
        </ul>
    </div>

@if(Session::has('msj'))
<div class="notification is-success" id="a1">
  <button class="delete" onclick="document.getElementById('a1').remove()"></button>
 {{ Session::get('msj')}}
</div>
@endif

@if(Auth::user()->user_type == 4)
<form  method="POST" action="">

        {{ csrf_field() }}
        <div class="panel-body flex">            
            
                <div class="control">
                    <label class="label">Edad de la madre:</label>
                    <input type="number" class="input" name="edad_madre"  value="{{$user->born->edad_madre }}">
                </div>

                <div class="control">
                    <label class="label">No. embarazo de la madre:</label>
                    <input type="number" class="input" name="no_embarazo"  value="{{$user->born->no_embarazo }}">
                </div>
            
                <div class="field">                    
                        <label class="label">Tipo de nacimiento:</label>                        
                        <div class="select">
                        <select class="" name="tipo_nacimiento" v-model="tipo_nacimiento">
                            <option value="1">Natural</option>
                            <option value="2">Cesarea</option>
                        </select>
                    </div>
                </div>      
                
                <div class="field">                    
                    <label class="label">Llanto inmediato:</label>                        
                    <div class="select">
                        <select name="llanto_inmediato" v-model="llanto_inmediato">
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                </div>  

                <div class="field">
                    <label class="label">APGAR:</label>
                    <input type="number" class="input" name="APGAR"  value="{{$user->born->APGAR }}">
                </div>

                <div class="control">
                    <label class="label">Peso Kg al nacer:</label>
                    <input type="number" class="input" name="peso"  value="{{$user->born->peso }}">
                </div>

                <div class="control">
                    <label class="label">Talla al nacer cm:</label>
                    <input type="number" class="input" name="talla"  value="{{$user->born->talla }}">
                </div>

                <div class="field">                    
                    <label class="label">Se guardo sangre criogena del cordón:</label>                        
                    <div class="select">
                        <select name="sangre_criogena_cordon" v-model="sangre_criogena_cordon">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div> 
        </div>
                <div class="control">
                    <label class="label">Malformaciones:</label>
                    <textarea class="textarea" name="malformaciones">{{$user->born->malformaciones }}
                    </textarea>
                </div>

                <div class="control">
                    <label class="label">Complicaciones en el embarazo:</label>
                    <textarea class="textarea" name="complicaciones_embarazo">{{ $user->born->complicaciones_embarazo }}
                    </textarea>
                </div>                

        

        <br>
        <button type="submit" class="button is-success">Actualizar Expediente de Nacimiento</button>
        <br>
</form>

@else

<form  method="POST" action="">

        {{ csrf_field() }}
        <div class="panel-body flex">            
            
                <div class="control">
                    <label class="label">Edad de la madre:</label>
                    <input type="number" class="input" name="edad_madre"  value="{{$user->born->edad_madre }}" disabled>
                </div>

                <div class="control">
                    <label class="label">No. embarazo de la madre:</label>
                    <input type="number" class="input" name="no_embarazo"  value="{{$user->born->no_embarazo }}" disabled>
                </div>
            
                <div class="field">                    
                        <label class="label">Tipo de nacimiento:</label>                        
                        <div class="select">
                        <select class="" name="tipo_nacimiento" v-model="tipo_nacimiento" disabled>
                            <option value="1">Natural</option>
                            <option value="2">Cesarea</option>
                        </select>
                    </div>
                </div>      
                
                <div class="field">                    
                    <label class="label">Llanto inmediato:</label>                        
                    <div class="select">
                        <select name="llanto_inmediato" v-model="llanto_inmediato" disabled>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                </div>  

                <div class="field">
                    <label class="label">APGAR:</label>
                    <input type="number" class="input" name="APGAR"  value="{{$user->born->APGAR }}" disabled>
                </div>

                <div class="control">
                    <label class="label">Peso Kg al nacer:</label>
                    <input type="number" class="input" name="peso"  value="{{$user->born->peso }}" disabled>
                </div>

                <div class="control">
                    <label class="label">Talla al nacer cm:</label>
                    <input type="number" class="input" name="talla"  value="{{$user->born->talla }}" disabled>
                </div>

                <div class="field">                    
                    <label class="label">Se guardo sangre criogena del cordón:</label>                        
                    <div class="select">
                        <select name="sangre_criogena_cordon" v-model="sangre_criogena_cordon" disabled>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div> 
        </div>
                <div class="control">
                    <label class="label">Malformaciones:</label>
                    <textarea class="textarea" name="malformaciones" disabled>{{$user->born->malformaciones }}
                    </textarea>
                </div>

                <div class="control">
                    <label class="label" disabled>Complicaciones en el embarazo:</label>
                    <textarea class="textarea" name="complicaciones_embarazo" disabled>{{ $user->born->complicaciones_embarazo }}
                    </textarea>
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
            // gender: {{ $user->gender }},
            llanto_inmediato: {{ $user->born->llanto_inmediato }},
            tipo_nacimiento: {{$user->born->tipo_nacimiento }},
            sangre_criogena_cordon: {{ $user->born->sangre_criogena_cordon }},
            
            view: {
                    user: true,
                    direction: false,
                    personal: false,
                    expedient: false,
                    born: false,
                },
            },

        
        });
    
    </script>
@endsection