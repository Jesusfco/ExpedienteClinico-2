@extends('layouts.aplication')

@section('content')


    <div class="panel-heading">Mis Citas</div>

    <div class="panel-body">

    

       

        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        
                        <th scope="col">Doctor</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Consultorio</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($dates as $cita)
                    <tr>
                        <th scope="row">{{ $cita->id }}</th>
                        
                        <td>{{ $cita->medic }}</td>                    
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
