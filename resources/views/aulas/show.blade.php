@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Detalle de Aula</h1>
    <div class="card p-4 mb-3">
        <dl class="row mb-0">
            <dt class="col-sm-3">Nombre:</dt>
            <dd class="col-sm-9">{{ $aula->nombre }}</dd>

            <dt class="col-sm-3">Capacidad:</dt>
            <dd class="col-sm-9">{{ $aula->capacidad }}</dd>

            <dt class="col-sm-3">Ubicación:</dt>
            <dd class="col-sm-9">{{ $aula->ubicacion }}</dd>
        </dl>
    </div>
    <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-warning">Editar</a>
</div>
@endsection