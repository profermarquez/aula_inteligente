@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Detalle de Reserva</h1>
    <div class="card p-4 mb-3">
        <dl class="row mb-0">
            <dt class="col-sm-3">Aula:</dt>
            <dd class="col-sm-9">{{ $reserva->aula->nombre ?? '—' }}</dd>

            <dt class="col-sm-3">Materia:</dt>
            <dd class="col-sm-9">{{ $reserva->materia->nombre ?? '—' }}</dd>

            <dt class="col-sm-3">Fecha:</dt>
            <dd class="col-sm-9">{{ $reserva->fecha }}</dd>

            <dt class="col-sm-3">Horario:</dt>
            <dd class="col-sm-9">{{ $reserva->hora_inicio }} - {{ $reserva->hora_fin }}</dd>

            <dt class="col-sm-3">Estado:</dt>
            <dd class="col-sm-9">{{ ucfirst($reserva->estado) }}</dd>

            <dt class="col-sm-3">Origen:</dt>
            <dd class="col-sm-9">{{ $reserva->origen }}</dd>
        </dl>
    </div>
    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning">Editar</a>
</div>
@endsection