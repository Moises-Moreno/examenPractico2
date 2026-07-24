@extends('layouts.app')

@section('titulo', 'Servicios')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Servicios</h1>
        <a href="{{ route('servicios.create') }}" class="btn btn-primary">+ Nuevo Servicio</a>
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
                        <th>Servicio</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Registrado por</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->nombre }}</td>
                            <td>Bs {{ number_format($servicio->precio, 2) }}</td>
                            <td>{{ $servicio->estado }}</td>
                            <td>{{ $servicio->user->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay servicios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
