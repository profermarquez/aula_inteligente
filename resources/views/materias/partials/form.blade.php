@php
    // Garantiza que $materia y $docentes existan siempre
    /** @var \App\Models\Materia $materia */
    $materia = $materia ?? new \App\Models\Materia;

    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Docente[] $docentes */
    $docentes = $docentes ?? \App\Models\Docente::all();

    $editing = $materia->exists;
    $tipos   = ['presencial' => 'Presencial', 'virtual' => 'Virtual', 'hibrida' => 'Híbrida'];
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
    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $materia->nombre) }}" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Carrera</label>
        <input type="text" name="carrera" value="{{ old('carrera', $materia->carrera) }}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Tipo de cursada</label>
        <select name="tipo_cursada" class="form-select" required>
            @foreach($tipos as $key => $label)
                <option value="{{ $key }}" {{ old('tipo_cursada', $materia->tipo_cursada) == $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <label class="form-label">Año</label>
        <input type="number" name="anio" value="{{ old('anio', $materia->anio) }}" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Docente</label>
        <select name="docente_id" class="form-select">
            <option value="">— Sin asignar —</option>
            @foreach($docentes as $doc)
                <option value="{{ $doc->id }}" {{ old('docente_id', $materia->docente_id) == $doc->id ? 'selected' : '' }}>
                    {{ $doc->nombre }} ({{ $doc->dni }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
        <button class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Crear' }}</button>
    </div>
</div>
