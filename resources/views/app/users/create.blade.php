@extends('layouts.aplication')

@section('title', 'Crear Usuario') 

@section('content')


    <h1>Crear Usuario</h1>

    <div class="panel-body" id="app">

  

        <form  method="POST" action="" >
            {{ csrf_field() }}

            <div class="control">
                <label class="label" >Nombre</label>
                <input type="text" class="input" name="name"  value="{{ old('name') }}" required>
            </div>

            <div class="control">
                <label class="label">Apellido Paterno</label>
                <input class="input" type="text"  name="patern" value="{{ old('patern') }}">
            </div>

            <div class="control">
                <label class="label">Apellido Materno</label>
                <input class="input" type="text"  name="matern" value="{{ old('matern') }}">
            </div>

            <div class="control">
                <label class="label">Correo</label>
                <input class="input" type="email" name="email" value="{{ old('email') }}" required> 

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>

            <div class="control">
                <label class="label">Contraseña</label>
                <input class="input" type="password" name="password" value="{{ old('password') }}"> 
            </div>

            <div class="control">

                <div>
                    <label class="label">Sexo</label>
                    <select id="inputState" class="input" name="gender">
                        <option value="1" selected>Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                </div>

                <div>
                    <label class="label">Tipo de Usuario:</label>
                    <select class="input" name="user_type"  v-model="user_type">
                        <option value="1" selected>Paciente</option>
                        <option value="2">Enfermera</option>
                        <option value="3">Médico</option>
                        <option value="4">Administrador</option>
                    </select>
                </div>

                <div v-if="user_type == 3">
                    <label class="label">Especialidad:</label>
                    <input id="inputState" class="input" name="speciality">                        
                </div>

                <div v-if="user_type == 3">
                    <label class="label">Cedula:</label>
                    <input class="input" name="cedula" type="text">
                </div>

                <div v-if="user_type == 3">
                    <label class="label">Sub Especialidad:</label>
                    <input class="input" name="sub_speciality" type="text">
                </div>
                    
            </div>
             <br>
            <button type="submit" class="button is-success">Crear Usuario</button>

        </form>

        
            
    </div>

            
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    
    var app = new Vue({

        el: '#app',
        data: {     

            user_type: 1,

            },
        });
    
    </script>
@endsection
