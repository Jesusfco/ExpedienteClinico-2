@extends('layouts.aplication')

@section('content')


    <div class="panel-heading">Crear Usuario</div>

    <div class="panel-body" id="app">

  

        <form  method="POST" action="" >
            {{ csrf_field() }}

            <div class="form-group">
                <label >Nombre</label>
                <input type="text" class="form-control" name="name"  placeholder="PEPE" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Apellido Paterno</label>
                <input class="form-control" type="text"  name="patern" value="{{ old('patern') }}">
            </div>

            <div class="form-group">
                <label>Apellido Materno</label>
                <input class="form-control" type="text"  name="matern" value="{{ old('matern') }}">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required> 

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input class="form-control" type="password" name="password" value="{{ old('password') }}"> 
            </div>

            <div class="form-group">

                <div>
                    <label>Sexo</label>
                    <select id="inputState" class="form-control" name="gender">
                        <option value="1" selected>Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                </div>

                <div>
                    <label>Tipo de Usuario:</label>
                    <select id="inputState" class="form-control" name="user_type"  v-model="user_type">
                        <option value="1" selected>Paciente</option>
                        <option value="2">Enfermera</option>
                        <option value="3">Médico</option>
                        <option value="4">Administrador</option>
                    </select>
                </div>

                <div v-if="user_type == 3">
                    <label>Especialidad:</label>
                    <select id="inputState" class="form-control" name="speciality_id">
                        <option value="1">UROLOGIA</option>
                        <option value="3">NEUROLOGIA</option>
                        <option value="2">CARDIOLOGIA</option>
                        
                    </select>
                </div>

                <div v-if="user_type == 3">
                    <label>Cedula:</label>
                    <input class="form-control" name="cedula" type="text">
                </div>

                <div v-if="user_type == 3">
                    <label>Sub Especialidad:</label>
                    <input class="form-control" name="sub_speciality" type="text">
                </div>
                    
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Crear Usuario</button>

        </form>

        
            
    </div>

            
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    
    var app = new Vue({
        el: '#app',

        data: {
            message: 'Hello Vue!',
            user_type: 1,

            }
        });
    
    </script>
@endsection
