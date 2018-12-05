@extends('layouts.aplication')
@section('title', 'Ver Receta #' . $recipe->id) 
@section('content')


<h1>Receta #{{$recipe->id}}</h1>

    <div class="panel-body" id="app">

        
            <div class="form-group">
                <label class="label">Paciente</label>
                <input type="text" class="input" name="pacient" value="{{ $recipe->user->name }} {{ $recipe->user->patern }}" disabled>
            </div>

            <div class="form-group">
                <label class="label">Medico</label>
                <input type="text" class="input" name="pacient" value="{{ $recipe->medic->name }} {{ $recipe->medic->patern }}" disabled>
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
