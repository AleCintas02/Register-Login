<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body>
    @auth
        <a href="{{ route('logout') }}">Salir</a>
    @else
        <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
        <li><a href="{{ route('register') }}">Registrarse</a></li>
    @endauth
</body>

</html>
