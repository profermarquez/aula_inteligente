@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Horarios</h1>
        <a href="{{ route('horarios.create') }}" class="btn btn-primary">Nuevo Horario</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Periodo</th>
                <th>Día</th>
                <th>Turno</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Reserva?</th>
                <th class="text-center" style="width: 160px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($horarios as $h)
            <tr>
                <td>{{ $h->id }}</td>
                <td>{{ $h->periodo }}</td>
                <td>{{ $h->dia }}</td>
                <td>{{ ucfirst($h->turno) }}</td>
                <td>{{ $h->hora_inicio }}</td>
                <td>{{ $h->hora_fin }}</td>
                <td>{{ $h->necesita_reserva ? 'Sí' : 'No' }}</td>
                <td class="text-center">
                    <a href="{{ route('horarios.edit', $h) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('horarios.destroy', $h) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar horario?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="text-center">No hay horarios registrados.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection