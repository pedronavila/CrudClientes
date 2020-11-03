<!DOCTYPE html>
<html lang="es">
    <head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/crud.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/validateNumLetter.js') }}"></script>
    <script src="{{ asset('js/registrosGuardaActualiza.js') }}"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary" style = "background-color:#3096d1;">
            <a href="#" class="navbar-brand" style = "color:white;">CRUD Clientes</a>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>