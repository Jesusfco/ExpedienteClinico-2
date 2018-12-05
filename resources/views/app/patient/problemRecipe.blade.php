@extends('layouts.aplication')

@section('content')

    
<h1>Receta #{{$recipe->id}}</h1>

@if(Session::has('msj'))
    <div class="notification is-success" id="a1">
        <button class="delete" onclick="document.getElementById('a1').remove()"></button>
        {{ Session::get('msj')}}
    </div>
@endif

    <div class="panel-body" id="app">

        
            <div class="field">
                <label >Paciente</label>
                <input type="text" class="input" name="pacient" value="{{ $recipe->user->name }} {{ $recipe->user->patern }}" disabled>
            </div>

            <div class="field">
                <label >Medico</label>
                <input type="text" class="input" name="pacient" value="{{ $recipe->medic->name }} {{ $recipe->medic->patern }}" disabled>
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

                <h2>Anote cualquier sintoma o malestar</h2>
                
                <form  method="POST" action=""  onsubmit="return app.checkForm()">
                    {{ csrf_field() }}

                    <div class="field">
                        <label >Observación:</label>
                        <br>
                        <textarea class="textarea" name="observation" value="{{ $recipe->observation }}">{{ $recipe->observation }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>

                </form>


                
        
            
    </div>


    

    
            
@endsection
