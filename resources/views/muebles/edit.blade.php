@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Mueble</h1>
    <form method="POST" action="{{ route('muebles.update', $mueble) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" required>
                <option value="Mesa" {{ $mueble->tipo == 'Mesa' ? 'selected' : '' }}>Mesa</option>
                <option value="Silla" {{ $mueble->tipo == 'Silla' ? 'selected' : '' }}>Silla</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" name="estado" required>
                <option value="Funcional" {{ $mueble->estado == 'Funcional' ? 'selected' : '' }}>Funcional</option>
                <option value="Roto" {{ $mueble->estado == 'Roto' ? 'selected' : '' }}>Roto</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula</label>
            <select class="form-select" name="aula_id" required>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ $mueble->aula_id == $aula->id ? 'selected' : '' }}>{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection