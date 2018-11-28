@extends('layouts.aplication')

@section('content')


    <div class="panel-heading">Recetas</div>

    <div class="panel-body">

    <a href="{{ url('app/recetas/create') }}"> <button type="button" class="btn btn-success">Crear Receta</button>
            </a>

        

        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Fecha de Creacion</th>
                        <th scope="col">Efecto Secundario</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($recipes as $re)

                        <tr>
                            <th scope="row">{{ $re->id }}</th>
                            <td>{{ $re->user }}</td>
                            <td>{{ $re->medic }}</td>                    
                            <td>{{ $re->created_at }}</td>
                            @if($re->observation == NULL)
                            <td>No</td>
                            @else
                            <td>Si</td>
                            @endif
                            
                            <td>
                                <a href="{{ url('app/recetas/show/' . $re->id ) }}"><button type="button" class="btn btn-success btn-sm">Ver</button></a>
                                <a href="{{ url('app/recetas/PDF/' . $re->id ) }}"><button type="button" class="btn btn-info btn-sm">PDF</button></a>
                                <a href="{{ url('app/recetas/crearDescription/' . $re->id ) }}"><button type="button" class="btn btn-success btn-sm">Editar</button></a>
                                <a href="{{ url('app/recetas/delete/' . $re->id ) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                    
                            </td>
                        </tr>

                    @endforeach
                    
                </tbody>
                </table>

                {{ $recipes->links() }}
            
    </div>
            
@endsection
