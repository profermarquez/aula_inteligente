@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ isset($aire) ? 'Editar' : 'Nuevo' }} Aire Acondicionado</h1>
    <form method="POST" action="{{ isset($aire) ? route('aires.update', $aire) : route('aires.store') }}">
        @csrf
        @if(isset($aire)) @method('PUT') @endif

        <div class="mb-3">
            <label>Temperatura objetivo</label>
            <input type="number" name="temperatura_objetivo" class="form-control" value="{{ $aire->temperatura_objetivo ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>Momento del día</label>
            <select name="momento_dia" class="form-select">
                @foreach(['Mañana','Tarde','Noche'] as $op)
                    <option value="{{ $op }}" @if(isset($aire) && $aire->momento_dia == $op) selected @endif>{{ $op }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Aula</label>
            <select name="aula_id" class="form-select">
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" @if(isset($aire) && $aire->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
