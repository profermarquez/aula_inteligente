@php
    /** @var \App\Models\Aula $aula */
    $aula    = $aula   ?? new \App\Models\Aula;
    $editing = $aula->exists;
@endphp

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $aula->nombre) }}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Capacidad</label>
        <input type="number" min="1" name="capacidad" value="{{ old('capacidad', $aula->capacidad) }}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" value="{{ old('ubicacion', $aula->ubicacion) }}" class="form-control" required>
    </div>

    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
        <button class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Crear' }}</button>
    </div>
</div>

