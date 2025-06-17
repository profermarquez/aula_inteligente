<!-- resources/views/focos/create.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Foco</h1>
    <form method="POST" action="{{ route('focos.store') }}">
        @csrf
        <div class="mb-3">
            <label>Intensidad</label>
            <input type="number" name="intensidad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Momento del día</label>
            <select name="momento_dia" class="form-select">
                @foreach(['Mañana','Tarde','Noche'] as $op)
                    <option value="{{ $op }}">{{ $op }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Actividad</label>
            <input type="text" name="actividad" class="form-control">
        </div>
        <div class="mb-3">
            <label>Aula</label>
            <select name="aula_id" class="form-select">
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
