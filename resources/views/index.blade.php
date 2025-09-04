@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Lista de Estudiantes</h1>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">
                    Crear Nuevo Estudiante
                </a>
            </div>

            @if($estudiantes->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Carnet</th>
                            <th>Email</th>
                            <th>Edad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->id }}</td>
                            <td>{{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->apellidos }}</td>
                            <td>{{ $estudiante->carnet_identidad }}</td>
                            <td>{{ $estudiante->email }}</td>
                            <td>{{ $estudiante->edad }}</td>
                            <td>
                                <span class="badge {{ $estudiante->estado ? 'bg-success' : 'bg-danger' }}">
                                    {{ $estudiante->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info">
                No hay estudiantes registrados.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection