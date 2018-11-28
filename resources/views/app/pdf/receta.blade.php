<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receta #{{$recipe->id}} Clinica Muñoa</title>
</head>
<body>

    <style>
         * {     
            padding: 0;
            margin: 6px;
            font-family: sans-serif;
        }
    
        .title {
            display: block;
        }

        .title div {
            display: inline-block;
        }

        .title h1{ font-size: 65px; }
        .title h2{ font-size: 25px; }

        .name {

            margin: 0;
            display: flex;
            /* align-items: center; */
            align-content: center;
        }

        .slogan {
            font-size: 17px;
            /* display: flow-root; */
        }

        .centerText {
            text-align: center;
        }

        .negritas {
            font-weight: 800;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 11px;
            border: 1;
        }

        th, td {
            text-align: center;
            padding: 2px 8px 2px 8px;
            border-bottom: 1px solid;
        }
        th {
            background-color: #789;
            color: white;            
        }
        tr:nth-child(even){background-color: #f2f2f2}

       
    </style>

    <div class="title">

        <div>
            <h1>M</h1>
        </div>
        
        <div class="name">
                <h2>Clinica Muñoa <br><span class="slogan">Tu salud nos preocupa</span></h2>
                {{-- <h4></h4> --}}
        </div>

    </div>
    
    

    <div class="form-group">
        
        <p><span class="negritas">Paciente: </span> {{ $recipe->user->name }} {{ $recipe->user->patern }} {{ $recipe->user->matern }}</p>
    </div>

    <div class="form-group">
           
        <p> <span class="negritas">Médico: </span>{{ $recipe->medic->name }} {{ $recipe->medic->patern }} {{ $recipe->medic->matern }}</p>
    </div>

    <h2 class="centerText">Receta Individual</h2>
    <h5 class="centerText">INFORMACION CONFIDENCIAL</h5>

    
    <p><span class="negritas">Fecha de expedición: </span>{{ date('d / m / Y', strtotime($recipe->created_at))  }}</p>
    
    
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
</body>
</html>