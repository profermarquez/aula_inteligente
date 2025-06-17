@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Listado de Materias</h1>
        <a href="{{ route('materias.create') }}" class="btn btn-primary">Nueva Materia</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Tipo de cursada</th>
                <th>Año</th>
                <th>Docente</th>
                <th class="text-center" style="width: 160px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($materias as $materia)
            <tr>
                <td>{{ $materia->id }}</td>
                <td>{{ $materia->nombre }}</td>
                <td>{{ $materia->carrera }}</td>
                <td>{{ ucfirst($materia->tipo_cursada) }}</td>
                <td>{{ $materia->anio }}</td>
                <td>{{ optional($materia->docente)->nombre ?? '—' }}</td>
                <td class="text-center">
                    <a href="{{ route('materias.show', $materia) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('materias.edit', $materia) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('materias.destroy', $materia) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar materia?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center">No hay materias cargadas.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection