@extends('layouts.aplication')
@section('title', 'Citas Medicas') 
@section('content')


    <h1>Citas Medicas</h1>

    <div class="panel-body">

    <a href="{{ url('app/citas/create') }}"> <button type="button" class="button is-link">Crear Cita</button>
            </a>

        <form class="form-horizontal" method="GET" action="">
            

            {{-- <div class="row form-group">
                <div class="form-group col-6">
                    <label>Fecha Inicio</label>

                    <div>
                        <input id="name" type="date" class="form-control" name="from" value="{{ old('from') }}" autofocus>
                    </div>
                </div>

                <div class="form-group col-6">
                    <label>Fecha Final</label>

                    <div>
                        <input id="name" type="date" class="form-control" name="to" value="{{ old('to') }}" >
                    </div>
                </div>
            </div> --}}
            

        </form>

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
                            <a href="{{ url('app/citas/delete/' . $cita->id ) }}"><button type="button" class="button is-danger">Eliminar</button></a>                                
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
                </table>

                {{ $dates->links() }}
            
    </div>
            
@endsection
