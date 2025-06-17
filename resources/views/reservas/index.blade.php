@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Reservas</h1>
        <a href="{{ route('reservas.create') }}" class="btn btn-primary">Nueva Reserva</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Materia</th>
                <th>Fecha</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th class="text-center" style="width: 160px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->aula->nombre ?? '—' }}</td>
                <td>{{ $reserva->materia->nombre ?? '—' }}</td>
                <td>{{ $reserva->fecha }}</td>
                <td>{{ $reserva->hora_inicio }}</td>
                <td>{{ $reserva->hora_fin }}</td>
                <td>{{ ucfirst($reserva->estado) }}</td>
                <td class="text-center">
                    <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar reserva?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="text-center">No hay reservas registradas.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection