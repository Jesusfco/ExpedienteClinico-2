<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expediente Paciente: {{ $user->name }} {{ $user->patern }} {{ $user->matern }}</title>
</head>
<body>

    <div class="logo">
        <img src="{{ url('img/logo2.jpg')}}">
    </div>


    <h1 class="centerText">Historial Clínico Electronico</h1>

    <div class="topDataUser">
        <p>Nombre: <span> {{ $user->name }} </span> Fecha de nacimiento <span>{{ $user->personal->birthday }}</span> Sexo <span>{{ $user->genderView() }}</span></p>
        <p>Apellido Paterno: <span>{{ $user->patern}}</span>  Apellido Materno <span>{{ $user->matern }}</span>
        <p>Domicilio <span>{{ $user->address->allAd() }}</span></p>
        <p>Teléfono: <span>{{ $user->personal->phone }}</span> Estado Civil <span>{{ $user->personal->civil_status }}</span></p>
        <p>Ocupación: <span>{{ $user->personal->occupation }}</span> Tipo de Sangre <span>{{ $user->expedient->blood_type }}</span></p>
    </p>

    <h2 class="centerText">2.- ANTECENTES</h2>
    <h3 class="centerText">2.1.- HEREDO FAMILIARES</h3>
    <div class="cuadro"><br>{{ $user->expedient->antecedentes_heredo_familiares }}<br></div>

    <h3 class="centerText">2.2.- PERSONALES PATOLOGICOS</h3>
    <div class="cuadro"><br>{{ $user->expedient->antecedentes_personales_patologicos }}<br></div>

    <h3 class="centerText">2.3.- PERSONALES NO PATOLOGICOS</h3>
    <div class="cuadro"><br>{{ $user->expedient->antecedentes_personales_no_patologicos }}<br></div>

    <h2 class="centerText">3.- PADECIMIENTOS ACTUALES</h2>
    <div class="cuadro"><br>{{ $user->expedient->padecimientos_actuales }}<br></div>
    <div class="generalData">

       

    

    <h1 class="centerText">4.- Alergias</h1>

    <table>
        <thead>
            <tr>
                <th>Alergia</th>
                <th>Descripcion</th> 
                
            </tr>
        </thead>
        <tbody>
            
            @foreach($user->allergies as $alergy)
            <tr>
            <th>{{ $alergy->name }}</th>
            <th>{{ $alergy->description }}</th>
            
            </tr>
            @endforeach

        <tbody>


    </table>






<style> 
* {font-family: arial, sans-serif;     }

    span {
        /* font-weight: bold; */
        /* font-size: 21px; */
    }

    table {
    
        border-collapse: collapse;
        width: 100%;
    }

    table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #02ffd9;}



table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: white;
  color: black;
}

 .topDataUser span {
    text-decoration: underline;
    
 }

 .topDataUser p {
    font-size: 16px;
    margin: 5px;
 }

.logo img {
    margin-left: 80px;
}
.logo {
    width: 90%;
    display: block;
    margin: 0 auto;padding-bottom: 20px;
    border-bottom: 1px solid black;
}

.logo h1 {
    margin: 0px;
}

.logo h2 {
    margin: 0px;
}
.centerText {
    text-align: center;
}

.cuadro {
    padding: 15px;
    width: 100%;
    min-height: 200px;
    border: black 2px solid;
}
.generalData {
    display: block;
    /* flex-wrap: wrap; */
}

.generalData div {
    display: inline-block;
    width: 45%;
    padding: 10px;
}

</style>
    
</body>
</html>