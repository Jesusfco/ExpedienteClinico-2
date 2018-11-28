@extends('layouts.aplication')

@section('content')


<div class="panel-heading">Receta #{{$recipe->id}}</div>

    <div class="panel-body" id="app">

        
            <div class="form-group">
                <label >Paciente</label>
                <input type="text" class="form-control" name="pacient" value="{{ $recipe->user->name }} {{ $recipe->user->patern }}" disabled>
            </div>

            <div class="form-group">
                <label >Medico</label>
                <input type="text" class="form-control" name="pacient" value="{{ $recipe->medic->name }} {{ $recipe->medic->patern }}" disabled>
            </div>

            <p> <strong>Observación: </strong> {{ $recipe->observation }} </p>
            
            <h4>Descripción</h4>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Medicamento</th>
                            <th scope="col">Frecuencia</th>
                            
                            <th scope="col">Contraindicaciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                        @foreach($recipe->description as $re)
                            <tr>
                                
                                <td> {{ $re->medicine }}</td>
                                <td> {{ $re->frequency }}</td>
                                <td> {{ $re->contraindications }}</td>
                                
                            </tr>

                         @endforeach   
                    </tbody>
                </table>


                
        
            
    </div>


    

    
            
@endsection
