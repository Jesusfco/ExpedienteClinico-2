<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <p>Haz click en el siguiente enlace para restaurar tu contraseña 
        <a href="{{ url('resetPassword/'. $token)}}">RESTAURAR</a></p>
</body>
</html>