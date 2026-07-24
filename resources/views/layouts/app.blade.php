<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Taller SCZ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #2d3e50;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('vehiculos.index') }}">Taller SCZ - Gestión de Vehículos</a>
        </div>
    </nav>

    <main class="container my-4">
        @yield('contenido')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
