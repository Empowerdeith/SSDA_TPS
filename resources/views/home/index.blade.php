<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('snippets.links')
</head>
<body>
    @include('snippets.header')
    @auth
        <p>Bienvenido, {{auth()->user()->name ?? auth()->user()->username}}</p>
    @endauth
    @guest
        <p>Debes iniciar Sesión, Te pillamos pos compadre.</p>
    @endguest
    @include('snippets.footer2')
</body>
</html>
