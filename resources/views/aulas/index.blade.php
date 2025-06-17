@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Listado de Aulas</h1>
        <a href="{{ route('aulas.create') }}" class="btn btn-primary">Nueva Aula</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Ubicación</th>
                <th class="text-center" style="width: 160px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($aulas as $aula)
            <tr>
                <td>{{ $aula->id }}</td>
                <td>{{ $aula->nombre }}</td>
                <td>{{ $aula->capacidad }}</td>
                <td>{{ $aula->ubicacion }}</td>
                <td class="text-center">
                    <a href="{{ route('aulas.show', $aula) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar aula?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">No hay aulas registradas.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection