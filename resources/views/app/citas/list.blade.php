@extends('layouts.aplication')
@section('title', 'Citas Medicas') 
@section('content')


    <h1>Citas Medicas</h1>

    <div class="panel-body">

        @if(Auth::user()->user_type > 3 )
    <a href="{{ url('app/citas/create') }}"> <button type="button" class="button is-link">Crear Cita</button>
            </a>
        @endif

        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($dates as $cita)
                    <tr>
                        <th scope="row">{{ $cita->id }}</th>
                        <td>{{ $cita->user }}</td>
                        <td>{{ $cita->medic }}</td>                    
                        <td>{{ $cita->subject }}</td>
                        <td>{{ $cita->date }}</td>
                        <td>{{ $cita->hour }}</td>
                        <td>
                            <a href="{{ url('app/citas/show/' . $cita->id ) }}"><button type="button" class="button is-success">Ver</button></a>
                            @if(Auth::user()->user_type > 3 )
                            <a href="{{ url('app/citas/edit/' . $cita->id ) }}"><button type="button" class="button is-warning">Editar</button></a>
                            <a href="{{ url('app/citas/delete/' . $cita->id ) }}"><button type="button" class="button is-danger">Eliminar</button></a>                                
                            @endif
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
                </table>

                {{ $dates->links() }}
            
    </div>
            
@endsection
