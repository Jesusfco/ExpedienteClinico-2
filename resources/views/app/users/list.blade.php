@extends('layouts.aplication')

@section('title', 'Usuarios') 

@section('content')


    <h1>Usuarios</h2>

    <div class="panel-body">
            @if(Auth::user()->user_type > 3 )
                <a href="{{ url('app/users/create') }}"> <button type="button" class="button is-info">Crear Usuario</button>
            </a>

            @endif

        <form class="form-horizontal" method="GET" action="">
            

            <div class="field">
                <label for="name" class="col-md-4 control-label">Buscar</label>

                
                    <input id="name" type="text" class="input" name="search" value="{{ old('search') }}" autofocus>

                    
                </div>
            </div>

        </form>

        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">A Paterno</th>
                    <th scope="col">A Materno</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($users as $user)
                    <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->patern }}</td>
                    
                    <td>{{ $user->matern }}</td>
                    @if($user->user_type == 1)
                        <td>Paciente</td>
                    @elseif($user->user_type == 2)
                        <td>Enfermera</td>   
                    @elseif($user->user_type == 3)
                    <td>Médico</td>  
                    @elseif($user->user_type == 4)
                    <td>Administrador</td>           
                    @endif

                    <td>
                            <a href="{{ url('app/users/PDF' , $user->id ) }}" target="_blank"><button type="button" class="button is-link">Expediente</button></a>
                            @if(Auth::user()->user_type >= 3 )

                            <a href="{{ url('app/users/edit/usuario' , $user->id ) }}"><button type="button" class="button is-">Modificar</button></a>
                                @if($user->user_type == 1)
                                <a href="{{ url('app/users/alergias/' . $user->id ) }}"><button type="button" class="button">Alergias</button></a>
                                @endif
                            @endif

                            @if(Auth::user()->user_type > 3 )
                            
                            
                            <a href="{{ url('app/users/delete/' . $user->id ) }}"><button type="button" class="button is-danger">Eliminar</button></a>

                            @endif
                            
                    </td>
                    </tr>

                    @endforeach
                    
                </tbody>
                </table>

                {{ $users->links() }}
            
    </div>
            
@endsection
