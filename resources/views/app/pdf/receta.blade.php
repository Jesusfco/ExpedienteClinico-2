<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receta #{{$recipe->id}} </title>
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

        .qr {
            margin-left: 320px;
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

        .logoLeft {
            position: absolute;
            left: 40px;
            top: 30px;
            width: 130px;
        }
        .logoRight {
            position: absolute;
            right: 50px;
            top: 30px;
            width: 130px;
        }
       
        #principalLogo {
            width: 280px;
            margin-left: 250px;
        }
    </style>

<img class="logoLeft" src="{{ url('img/logo4.png')}}">
<img class="logoRight" src="{{ url('img/logo4.png')}}">
    <div class="title">
            <img id="principalLogo" src="{{ url('img/logo2.jpg')}}">
            <h2 class="centerText">{{ $recipe->medic->fullName() }}</h2>
            <p class="centerText">{{ $recipe->medic->medical->speciality }}</p>
            <p class="centerText">Cédula Profesional {{ $recipe->medic->medical->cedula }}</p>
            <p class="centerText">5 Oriente Norte # 1852 Col. Centro</p>
            <p class="centerText">C.P. 06700 Chiapas, Tuxtla Gutierrez</p>
    </div>
    
    
<hr>

<h4 class="centerText">Receta Individual</h4>
<h5 class="centerText">INFORMACION CONFIDENCIAL</h5>
        
    <p class="centerText"><span class="negritas">Nombre: </span> {{ $recipe->user->fullName() }} <span class="negritas">Fecha:</span> {{ $recipe->created_at }}</p>
    <p class="centerText"><span class="negritas">Peso: </span> {{ $recipe->user->expedient->weight }}K.g. <span class="negritas">Talla:</span> {{ $recipe->user->expedient->height}}cm
        <span class="negritas">Fecha de Nacimiento:</span> {{ $recipe->user->personal->birthday}}
    </p>
    


    
    
    
    
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
<br><br><br><br><br><br>
        

        <img class="qr" src="{{ url('images/QRLinks/'. $recipe->id . '.png') }}">
        <p  class="centerText"><span class="negritas">Fecha de expedición: </span>{{ date('d / m / Y', strtotime($recipe->created_at))  }}</p>
</body>
</html>