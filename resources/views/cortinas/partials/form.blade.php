@php
    /** @var \App\Models\Cortina $cortina */
    $cortina = $cortina ?? new \App\Models\Cortina;
    $editing = $cortina->exists;
    $aulas   = $aulas ?? \App\Models\Aula::all();
    $estados = ['Extendida' => 'Extendida', 'Recogida' => 'Recogida'];
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
        <label class="form-label">Aula</label>
        <select name="aula_id" class="form-select" required>
            <option value="">— Seleccionar —</option>
            @foreach($aulas as $au)
                <option value="{{ $au->id }}" {{ old('aula_id', $cortina->aula_id) == $au->id ? 'selected' : '' }}>
                    {{ $au->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" value="{{ old('ubicacion', $cortina->ubicacion) }}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select" required>
            @foreach($estados as $value => $label)
                <option value="{{ $value }}" {{ old('estado', $cortina->estado) == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('cortinas.index') }}" class="btn btn-secondary">Cancelar</a>
        <button class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Crear' }}</button>
    </div>
</div>
