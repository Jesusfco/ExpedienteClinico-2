@extends('layouts.aplication')

@section('content')

    @if(Session::has('msj'))
    <script> alert('Datos cargados'); </script>
    @endif
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

                <h2>¿Presento algun malestar causado por el tratamiento? Anotelo porfavor</h2>
                
                <form  method="POST" action=""  onsubmit="return app.checkForm()">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label >Observación:</label>
                        <br>
                        <textarea name="observation" value="{{ $recipe->observation }}">{{ $recipe->observation }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>

                </form>


                
        
            
    </div>


    

    
            
@endsection
