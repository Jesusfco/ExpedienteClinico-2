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
        <li><a href="{{ url('app/users/edit/nacimiento', $user->id) }}">Expediente</a></li>
        <li><a href="{{ url('app/users/edit/expediente', $user->id) }}">Expediente de nacimiento</a></li>

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

        <div  v-bind:class="{ 'hide': !view.user }" v-if="view.user" class="panel-body">

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

        <div  v-bind:class="{ 'hide': !view.direction }" class="panel-body">                  

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

        <div  v-bind:class="{ 'hide': !view.personal }" class="panel-body">            
            
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

            <br>

            <button type="submit" class="button is-success">Editar</button>

        </div>    

        <div v-bind:class="{ 'hide': !view.expedient }" class="panel-body">            
            
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
                    <textarea class="textarea" name="antecentes_heredo_familiares">
                        {{$user->expedient->antecentes_heredo_familiares }}
                    </textarea>
                </div>

                <div class="control">
                    <label class="label">Antecedentes Personales Patologicos:</label>
                    <textarea class="textarea" name="antecentes_personales_patologicos">
                        {{$user->expedient->antecentes_personales_patologicos }}
                    </textarea>
                </div>

                <div class="control">
                    <label class="label">Antecedentes Personales No Patologicos:</label>
                    <textarea class="textarea" name="antecentes_personales_no_patologicos">
                        {{$user->expedient->antecentes_personales_no_patologicos }}
                    </textarea>
                </div>

                <div class="control">
                    <label class="label">Antecedentes Personales No Patologicos:</label>
                    <textarea class="textarea" name="antecentes_personales_no_patologicos">
                        {{$user->expedient->antecentes_personales_no_patologicos }}
                    </textarea>
                </div>

        </div>

        <div v-bind:class="{ 'hide': !view.born }" class="panel-body">            
            
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

                <div class="control">
                    <label class="label">Malformaciones:</label>
                    <textarea class="textarea" name="malformaciones">
                        {{$user->born->malformaciones }}
                    </textarea>
                </div>

                <div class="control">
                    <label class="label">Complicaciones en el embarazo:</label>
                    <textarea class="textarea" name="complicaciones_embarazo">
                        {{ $user->born->complicaciones_embarazo }}
                    </textarea>
                </div>                

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