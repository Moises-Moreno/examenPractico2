@extends('layouts.app')

@section('titulo', 'Nuevo Servicio')

@section('contenido')
    <h1 class="h3 mb-3">Nuevo Servicio</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('servicios.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio (Bs)</label>
                    <input type="number" step="0.01" min="0" name="precio" id="precio" value="{{ old('precio') }}" class="form-control @error('precio') is-invalid @enderror">
                    @error('precio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="duracion_estimada" class="form-label">Duración estimada (minutos)</label>
                    <input type="number" min="1" name="duracion_estimada" id="duracion_estimada" value="{{ old('duracion_estimada') }}" class="form-control @error('duracion_estimada') is-invalid @enderror">
                    @error('duracion_estimada')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="">Seleccione...</option>
                        @foreach (['Pendiente', 'En proceso', 'Completado'] as $opcion)
                            <option value="{{ $opcion }}" {{ old('estado') === $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
                        @endforeach
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
