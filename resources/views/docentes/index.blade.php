@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Listado de Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="btn btn-primary">Nuevo Docente</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th class="text-center" style="width: 160px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($docentes as $docente)
            <tr>
                <td>{{ $docente->id }}</td>
                <td>{{ $docente->dni }}</td>
                <td>{{ $docente->nombre }}</td>
                <td>{{ $docente->especialidad }}</td>
                <td class="text-center">
                    <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar docente?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">No hay docentes cargados.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection