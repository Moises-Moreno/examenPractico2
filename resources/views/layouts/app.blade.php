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
            <a class="navbar-brand" href="{{ route('servicios.index') }}">Taller SCZ</a>
            <div class="d-flex align-items-center">
                <a href="{{ route('vehiculos.index') }}" class="nav-link text-white d-inline-block me-3">Vehículos</a>
                <a href="{{ route('servicios.index') }}" class="nav-link text-white d-inline-block me-3">Servicios</a>
                @auth
                    <span class="text-white-50 me-3">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Cerrar sesión</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container my-4">
        @yield('contenido')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
