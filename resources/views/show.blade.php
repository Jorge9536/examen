@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Detalles del Estudiante</h1>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>ID:</strong> {{ $estudiante->id }}</p>
                            <p><strong>Nombres:</strong> {{ $estudiante->nombres }}</p>
                            <p><strong>Apellidos:</strong> {{ $estudiante->apellidos }}</p>
                            <p><strong>Carnet de Identidad:</strong> {{ $estudiante->carnet_identidad }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ $estudiante->email }}</p>
                            <p><strong>Edad:</strong> {{ $estudiante->edad }}</p>
                            <p><strong>Fecha de Nacimiento:</strong> {{ $estudiante->fecha_nacimiento->format('d/m/Y') }}</p>
                            <p><strong>Estado:</strong> 
                                <span class="badge {{ $estudiante->estado ? 'bg-success' : 'bg-danger' }}">
                                    {{ $estudiante->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection