@extends('layouts.app')

@section('titulo', 'Editar Vehículo')

@section('contenido')
    <h1 class="h3 mb-3">Editar Vehículo</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" name="placa" id="placa" value="{{ old('placa', $vehiculo->placa) }}" class="form-control @error('placa') is-invalid @enderror">
                    @error('placa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" name="marca" id="marca" value="{{ old('marca', $vehiculo->marca) }}" class="form-control @error('marca') is-invalid @enderror">
                    @error('marca')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $vehiculo->modelo) }}" class="form-control @error('modelo') is-invalid @enderror">
                    @error('modelo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="anio" class="form-label">Año</label>
                    <input type="number" name="anio" id="anio" value="{{ old('anio', $vehiculo->anio) }}" class="form-control @error('anio') is-invalid @enderror">
                    @error('anio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" value="{{ old('color', $vehiculo->color) }}" class="form-control @error('color') is-invalid @enderror">
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
