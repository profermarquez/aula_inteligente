@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Cortinas</h1>
        <a href="{{ route('cortinas.create') }}" class="btn btn-primary">Nueva Cortina</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th class="text-center" style="width: 140px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($cortinas as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->aula->nombre ?? '—' }}</td>
                <td>{{ $c->ubicacion }}</td>
                <td>{{ $c->estado }}</td>
                <td class="text-center">
                    <a href="{{ route('cortinas.edit', $c) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('cortinas.destroy', $c) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar cortina?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">No hay cortinas registradas.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection