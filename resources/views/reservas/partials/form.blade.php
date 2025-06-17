@php
    /** @var \App\Models\Reserva $reserva */
    $reserva = $reserva ?? new \App\Models\Reserva;
    $editing = $reserva->exists;
    $horarios = $horarios ?? \App\Models\Horario::all();

    // Listas para selects
    $aulas    = $aulas    ?? \App\Models\Aula::all();
    $materias = $materias ?? \App\Models\Materia::all();
    $estados  = ['pendiente' => 'Pendiente', 'confirmada' => 'Confirmada', 'cancelada' => 'Cancelada'];
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
                <option value="{{ $au->id }}" {{ old('aula_id', $reserva->aula_id) == $au->id ? 'selected' : '' }}>
                    {{ $au->nombre }} (Cap. {{ $au->capacidad }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Materia</label>
        <select name="materia_id" class="form-select" required>
            <option value="">— Seleccionar —</option>
            @foreach($materias as $mat)
                <option value="{{ $mat->id }}" {{ old('materia_id', $reserva->materia_id) == $mat->id ? 'selected' : '' }}>
                    {{ $mat->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Fecha</label>
        <input type="date" name="fecha" value="{{ old('fecha', $reserva->fecha) }}" class="form-control" required>
    </div>
    <div class="col-md-4">
    <label class="form-label">Horario (bloque)</label>
    <select name="horario_id" class="form-select" required>
        <option value="">— Seleccionar —</option>
        @foreach($horarios as $h)
            <option value="{{ $h->id }}" {{ old('horario_id', $reserva->horario_id) == $h->id ? 'selected' : '' }}>
                {{ $h->dia }} {{ $h->hora_inicio }}-{{ $h->hora_fin }}
            </option>
        @endforeach
    </select>
</div>

    <div class="col-md-3">
        <label class="form-label">Hora inicio</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $reserva->hora_inicio) }}" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label class="form-label">Hora fin</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin', $reserva->hora_fin) }}" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select" required>
            @foreach($estados as $key => $label)
                <option value="{{ $key }}" {{ old('estado', $reserva->estado) == $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Origen</label>
        <input type="text" name="origen" value="{{ old('origen', $reserva->origen) }}" class="form-control">
    </div>

    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
        <button class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Crear' }}</button>
    </div>
</div>
