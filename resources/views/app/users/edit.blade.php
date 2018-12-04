@extends('layouts.aplication')
@section('title', 'Editar Usuario') 

@section('content')

<h1>Editar Usuario</h1>

<form  method="POST" action="" id="app">
    
    <div class="panel-body">

  

        
            {{ csrf_field() }}

            
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                <input type="text" class="input" name="name"  value="{{$user->name }}" required>
            </div>
            <div class="field">
                <label class="label">Apellido Paterno</label>
                <div class="control">
                <input type="text" class="input"  name="patern" value="{{ $user->patern }}">
            </div>

            <div class="field">
                <label class="label">Apellido Materno</label>
                <div class="control">
                <input type="text" class="input"  name="matern" value="{{ $user->matern }}">
            </div>

            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                <input type="email" class="input"  name="email" value="{{ $user->email }}" required> 
            </div>

            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                <input type="text" class="input" name="password"> 
            </div>

            <div class="field">                
                <label class="label">Sexo:</label>
                <div class="select">
                <select id="inputState" name="gender" v-model="gender">
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
                </div>
            </div>

           <div class="field">                
            <label class="label">Tipo de Usuario:</label>
            <div class="select">
            <select id="inputState" class="select"  name="user_type" v-model="user_type">
                        <option value="1">Paciente</option>
                        <option value="2">Enfermera</option>
                        <option value="3">Médico</option>
                        <option value="4">Administrador</option>
                    </select>       
            </div>                             
            </div>
                
        <input type="hidden" value="{{ $user->user_type }}" id="4">
        <input type="hidden" value="{{ $user->gender }}" id="5">
        @if($user->user_type == 3)
        <input type="hidden" value="{{ $user->medical->cedula }}" id="1">
        <input type="hidden" value="{{ $user->medical->sub_speciality }}" id="3">
        @endif

        <div v-if="user_type == 3">
            <label>Especialidad:</label>
            <select id="inputState" class="form-control" name="speciality_id"  v-model="speciality_id">
                <option value="1">UROLOGIA</option>
                <option value="3">NEUROLOGIA</option>
                <option value="2">CARDIOLOGIA</option>
                
            </select>
        </div>

        <div class="control" v-if="user_type == 3">
            <label>Especialidad:</label>
            <input class="input" name="cedula" type="text" value="{{ $user->speciality }}" v-model="cedula">
        </div>

        <div class="control" v-if="user_type == 3">
            <label>Cedula:</label>
            <input class="input" name="cedula" type="text" v-model="cedula">
        </div>

        <div class="control" v-if="user_type == 3">
            <label>Sub Especialidad:</label>
            <input class="input" name="sub_speciality" type="text" v-model="sub_speciality">
        </div>
                
            <br>

        <button type="submit" class="button is-success">Editar</button>

        

        
            
    </div>

    @if($user->user_type < 4)

    <div class="panel-heading">Dirección</div>

    <div class="panel-body">      
        
        <div class="form-group">
            <label >Calle</label>
            <input type="text" class="form-control" name="street"  value="{{$user->address->street }}">
        </div>

        <div class="form-group">
            <label>Colonia</label>
            <input class="form-control" type="text"  name="colony" value="{{ $user->address->colony }}">
        </div>

        <div class="form-group">
            <label>Ciudad</label>
            <input class="form-control" type="text"  name="city" value="{{ $user->address->city }}">
        </div>

        <div class="form-group">
            <label>Estado</label>
            <input class="form-control" type="text" name="state" value="{{ $user->address->state }}"> 

            

        </div>

        <div class="form-group">
            <label>Numero</label>
            <input class="form-control" type="number" name="house_number" value="{{ $user->address->house_number }}"> 
        </div>

        <div class="form-group">
            <label>Numero Interior</label>
            <input class="form-control" type="number" name="house_number_int" value="{{ $user->address->house_number_int }}"> 
        </div>

        <div class="form-group">
            <label>Codigo Postal</label>
            <input class="form-control" type="number" name="CP" value="{{ $user->address->CP }}"> 
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Editar</button>

    </div>

    <div class="panel-heading">Datos Personales</div>

    <div class="panel-body">
        
        <div class="form-group">
            <label >Teléfono 1</label>
            <input type="phone" class="form-control" name="phone"  value="{{$user->personal->phone }}">
        </div>

        <div class="form-group">
            <label>Teléfono 2</label>
            <input class="form-control" type="phone"  name="phone2" value="{{ $user->personal->phone2 }}">
        </div>

        <div class="form-group">
            <label>Nacionalidad</label>
            <input class="form-control" type="text"  name="nacionality" value="{{ $user->personal->nacionality }}">
        </div>

        <div class="form-group">
            <label>Fecha de nacimiento</label>
            <input class="form-control" type="date" name="birthday" value="{{ $user->personal->birthday }}"> 
        </div>

        <div class="form-group">
            <label>CURP</label>
            <input class="form-control" type="text" name="CURP" value="{{ $user->personal->CURP }}"> 
        </div>

        <div class="form-group">
            <label>Estado Civil</label>
            <input class="form-control" type="text" name="civil_status" value="{{ $user->personal->civil_status }}"> 
        </div>

        <div class="form-group">
            <label>Ocupación</label>
            <input class="form-control" type="text" name="occupation" value="{{ $user->personal->occupation }}"> 
        </div>

        <div class="form-group">
            <label>Padecimiento</label>
            <input class="form-control" type="text" name="suffering" value="{{ $user->personal->suffering }}"> 
        </div>

        <div class="form-group">
            <label>Religión</label>
            <input class="form-control" type="text" name="religion" value="{{ $user->personal->religion }}"> 
        </div>

        <div class="form-group">
            <label>Tipo de sangre</label>
            <input class="form-control" type="text" name="blood_type" value="{{ $user->personal->blood_type }}"> 
        </div>

        <div class="form-group">
            <label>Número de seguro social</label>
            <input class="form-control" type="text" name="social_secure" value="{{ $user->personal->social_secure }}"> 
        </div>

        <div class="form-group">
            <label>Estatura</label>
            <input class="form-control" type="number" name="height" value="{{ $user->personal->height }}"> 
        </div>

        <div class="form-group">
            <label>Nivel Socioeconómico</label>
            <select class="form-control" type="number" name="economic_level" value="{{ $user->personal->economic_level }}"> 
                <option value="{{$user->personal->economic_level}}"> {{$user->personal->economic_level}}</option>
                <option value="BAJA">BAJA</option>
                <option value="MEDIA">MEDIA</option>
                <option value="ALTA">ALTA</option>
            </select>
        </div>

        <button type="submit" class="button is-success">Editar</button>

    </div>

    @endif
 </form>           
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    
    var app = new Vue({
        el: '#app',
        

        data: {
            message: 'Hello Vue!',
            user_type: null,
            cedula: null,
            
            sub_speciality: null,
            gender: null,

            },

            created: function () {

                setTimeout(() => {
                    
                    app.user_type = document.getElementById('4').value;
                    app.gender = document.getElementById('5').value;

                    if(app.user_type == 3) {
                        app.cedula = document.getElementById('1').value;                        
                        app.sub_speciality = document.getElementById('3').value;
                    }
                    
                    
                    
                }, 100);
    
            }
        });
    
    </script>
@endsection