@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Crear Nuevo Estudiante</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('estudiantes.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombres" class="form-label">Nombres *</label>
                        <input type="text" class="form-control @error('nombres') is-invalid @enderror" 
                               id="nombres" name="nombres" value="{{ old('nombres') }}" >
                        @error('nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="apellidos" class="form-label">Apellidos *</label>
                        <input type="text" class="form-control @error('apellidos') is-invalid @enderror" 
                               id="apellidos" name="apellidos" value="{{ old('apellidos') }}" >
                        @error('apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="carnet_identidad" class="form-label">Carnet de Identidad *</label>
                        <input type="text" class="form-control @error('carnet_identidad') is-invalid @enderror" 
                               id="carnet_identidad" name="carnet_identidad" value="{{ old('carnet_identidad') }}" >
                        @error('carnet_identidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="edad" class="form-label">Edad *</label>
                        <input type="number" class="form-control @error('edad') is-invalid @enderror" 
                               id="edad" name="edad" value="{{ old('edad') }}">
                        @error('edad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento *</label>
                        <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                               id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                        @error('fecha_nacimiento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado">
                            <option value="1" {{ old('estado', 1) == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('estado', 1) == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection