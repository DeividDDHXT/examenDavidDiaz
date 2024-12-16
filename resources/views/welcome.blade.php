<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>


    <link rel="stylesheet" href="{{ asset('css/bienvenida.css') }}">
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>¡Bienvenido al sistema de productos!</h1>
            <p>Regístrate o inicia sesión para continuar.</p>
            <div class="actions">
                <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
                <a href="{{ route('login') }}" class="btn-login">Iniciar sesión</a>
            </div>
        </div>
    </div>
</body>
</html>

