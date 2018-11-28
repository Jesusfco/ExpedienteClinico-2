@extends('layouts.aplication')

@section('content')


    <div class="panel-heading">Usuarios</div>

    <div class="panel-body">

    <a href="{{ url('app/users/create') }}"> <button type="button" class="btn btn-success">Crear Usuario</button>
            </a>

        <form class="form-horizontal" method="GET" action="">
            

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Buscar</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="search" value="{{ old('search') }}" autofocus>

                    
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
                            <a href="{{ url('app/users/edit/' . $user->id ) }}"><button type="button" class="btn btn-primary btn-sm">Modificar</button></a>
                            @if($user->user_type == 1)
                            <a href="{{ url('app/users/alergias/' . $user->id ) }}"><button type="button" class="btn btn-secondary btn-sm">Alergias</button></a>
                            @endif
                            {{-- <a href=""><button type="button" class="btn btn-success btn-sm">Ver</button></a>
                            <a href=""><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                             --}}
                    </td>
                    </tr>

                    @endforeach
                    
                </tbody>
                </table>

                {{ $users->links() }}
            
    </div>
            
@endsection
