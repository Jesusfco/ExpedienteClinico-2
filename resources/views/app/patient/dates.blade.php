@extends('layouts.aplication')

@section('content')


    <h1>Mis Citas</h1>

    <div class="panel-body">

    

       

        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        
                        <th scope="col">Doctor</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Consultorio</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($dates as $cita)
                    <tr>
                        <th scope="row">{{ $cita->id }}</th>
                        @if( $cita->medic_id == NULL)
                        <td>Sin Docto Asignado</td>                    
                        @else
                        <td>{{ $cita->medic->fullName() }}</td>
                        @endif
                        <td>{{ $cita->subject }}</td>
                        <td>{{ $cita->date }}</td>
                        <td>{{ $cita->hour }}</td>
                        <td>{{ $cita->room }}</td>
                       
                    </tr>

                    @endforeach
                    
                </tbody>
                </table>

                {{-- {{ $dates->links() }} --}}
            
    </div>
            
@endsection
