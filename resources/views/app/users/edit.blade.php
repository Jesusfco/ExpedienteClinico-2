@extends('layouts.aplication')
@section('title', 'Editar Usuario') 

@section('content')

<style>
    .hide {
        display: none;
    }
</style>

<div id="app">
    
<h1>Editar Usuario</h1>

<div class="tabs is-centered">
    <ul>
        <li class="is-active"><a href="{{ url('app/users/edit/usuario', $user->id) }}">Usuario</a></li>
        <li><a href="{{ url('app/users/edit/direccion', $user->id) }}">Dirección</a></li>
        <li><a href="{{ url('app/users/edit/personal', $user->id) }}">Datos Personales</a></li>
        @if($user->user_type == 1)
        <li><a href="{{ url('app/users/alergias/' . $user->id ) }}">Alergias</a></li>
        <li><a href="{{ url('app/users/edit/expediente', $user->id) }}">Expediente</a></li>
        <li><a href="{{ url('app/users/edit/nacimiento', $user->id) }}">Expediente de nacimiento</a></li>

        @endif

    </ul>
</div>


@if(Session::has('msj'))
<div class="notification is-success" id="a1">
  <button class="delete" onclick="document.getElementById('a1').remove()"></button>
 {{ Session::get('msj')}}
</div>
@endif


    <form  method="POST" action="" >

        {{ csrf_field() }}

        <div  class="panel-body">

                <div class="field">
                    <label class="label">Nombre</label>
                    
                    <input type="text" class="input" name="name"  value="{{$user->name }}" required>
                </div>
                <div class="field">
                    <label class="label">Apellido Paterno</label>
                    
                    <input type="text" class="input"  name="patern" value="{{ $user->patern }}">
                </div>

                <div class="field">
                    <label class="label">Apellido Materno</label>                    
                    <input type="text" class="input"  name="matern" value="{{ $user->matern }}">
                </div>

                <div class="field">
                    <label class="label">Correo</label>
                    
                    <input type="email" class="input"  name="email" value="{{ $user->email }}" required> 
                </div>

                <div class="field">
                    <label class="label">Contraseña</label>
                
                    <input type="password" class="input" name="password"> 
                </div>

                <div class="field">                
                    <label class="label">Sexo:</label>
                    <div class="select">
                    <select name="gender" v-model="gender">
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    </div>
                </div>

            <div class="field">                
                <label class="label">Tipo de Usuario:</label>
                <div class="select">
                    <select class="select"  name="user_type" v-model="user_type">
                        <option value="1">Paciente</option>
                        <option value="2">Enfermera</option>
                        <option value="3">Médico</option>
                        <option value="4">Administrador</option>
                    </select>       
                </div>                             
            </div>                                            

            <div class="control" v-if="user_type == 3">
                <label class="label">Especialidad:</label>
                <input class="input" name="speciality" type="text" value="{{ $user->speciality }}" >
            </div>

            <div class="control" v-if="user_type == 3">
                <label class="label">Cedula:</label>
                <input class="input" name="cedula" type="text" v-model="cedula">
            </div>

            <div class="control" v-if="user_type == 3">
                <label class="label">Sub Especialidad:</label>
                <input class="input" name="sub_speciality" type="text" v-model="sub_speciality">
            </div>
                                    
                
        </div>        

       
            <br>

            <button type="submit" class="button is-success">Editar</button>

        </div>    

        

        <br>
        <button type="submit" class="button is-success">Editar</button>
        <br>

    </form> 

</div>


@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    
    const app = new Vue({
        el: '#app',
        

        data: {
            
            user_type: {{ $user->user_type}},
            cedula: null,
            blood_type: "{{$user->born->blood_type }}",
            sub_speciality: null,
            gender: {{ $user->gender }},
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

        created: function () {

            setTimeout(() => {
                
                // app.user_type = document.getElementById('4').value;
                // app.gender = document.getElementById('5').value;

                // if(app.user_type == 3) {
                //     app.cedula = document.getElementById('1').value;                        
                //     app.sub_speciality = document.getElementById('3').value;
                // }
                
                
                
            }, 100);

        },
        methods: {

            userView: function() {
                this.view = {
                    user: true,
                    direction: false,
                    personal: false,
                    expedient: false,
                    born: false,
                }
            },

            directionView: function() {
                
                this.view = {
                    user: false,
                    direction: true,
                    personal: false,
                    expedient: false,
                    born: false,
                }

                console.log(this.view);

            },

            personalView: function() {
                this.view = {
                    user: false,
                    direction: false,
                    personal: true,
                    expedient: false,
                    born: false,
                }
            },

            expedientView: function() {
                this.view = {
                    user: false,
                    direction: false,
                    personal: false,
                    expedient: true,
                    born: false,
                }
            },

            bornView: function() {
                this.view = {
                    user: false,
                    direction: false,
                    personal: false,
                    expedient: false,
                    born: true,
                }
            },
            
            subForm: function() {
                this.view = {
                    user: true,
                    direction: true,
                    personal: true,
                    expedient: true,
                    born: true,
                }
            }
        }
        });
    
    </script>
@endsection