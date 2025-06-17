@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Detalle de Materia</h1>

    <div class="card p-4 mb-3">
        <dl class="row mb-0">
            <dt class="col-sm-3">Nombre:</dt>
            <dd class="col-sm-9">{{ $materia->nombre }}</dd>

            <dt class="col-sm-3">Carrera:</dt>
            <dd class="col-sm-9">{{ $materia->carrera }}</dd>

            <dt class="col-sm-3">Tipo de cursada:</dt>
            <dd class="col-sm-9">{{ ucfirst($materia->tipo_cursada) }}</dd>

            <dt class="col-sm-3">Año:</dt>
            <dd class="col-sm-9">{{ $materia->anio }}</dd>

            <dt class="col-sm-3">Docente:</dt>
            <dd class="col-sm-9">{{ optional($materia->docente)->nombre ?? '—' }}</dd>
        </dl>
    </div>

    <a href="{{ route('materias.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('materias.edit', $materia) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
