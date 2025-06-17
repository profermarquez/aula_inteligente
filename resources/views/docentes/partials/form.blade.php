@php($editing = $docente->exists)
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
        <label class="form-label">DNI</label>
        <input type="text" name="dni" value="{{ old('dni', $docente->dni) }}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $docente->nombre) }}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Especialidad</label>
        <input type="text" name="especialidad" value="{{ old('especialidad', $docente->especialidad) }}" class="form-control" required>
    </div>

    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
        <button class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Crear' }}</button>
    </div>
</div>