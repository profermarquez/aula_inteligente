@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Mueble</h1>
    <form method="POST" action="{{ route('muebles.store') }}">
        @csrf
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" required>
                <option value="Mesa">Mesa</option>
                <option value="Silla">Silla</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" name="estado" required>
                <option value="Funcional">Funcional</option>
                <option value="Roto">Roto</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula</label>
            <select class="form-select" name="aula_id" required>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
