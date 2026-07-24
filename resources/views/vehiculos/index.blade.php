@extends('layouts.app')

@section('titulo', 'Vehículos')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Vehículos</h1>
        <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">+ Nuevo Vehículo</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Color</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vehiculos as $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->placa }}</td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->anio }}</td>
                            <td>{{ $vehiculo->color ?? '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este vehículo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay vehículos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
