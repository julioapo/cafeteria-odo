<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Correo Electronico</h1>
    <p>Este es el primer correo de Mercado Ahorro S.R.L</p>

    <br>

    <p><strong>Nombre:</strong>{{$contact['name_visitor']}}</p>
    <p><strong>Correo:</strong>{{$contact['email_visitor']}}</p>
    <p><strong>Mensaje:</strong>{{$contact['message_visitor']}}</p>



</body>
</html>