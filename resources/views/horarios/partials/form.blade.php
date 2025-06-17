@php
    /** @var \App\Models\Horario $horario */
    $horario = $horario ?? new \App\Models\Horario;
    $editing = $horario->exists;
    $dias    = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
    $turnos  = ['mañana' => 'Mañana', 'tarde' => 'Tarde', 'noche' => 'Noche'];
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
        <label class="form-label">Periodo</label>
        <input type="text" name="periodo" value="{{ old('periodo', $horario->periodo) }}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Día</label>
        <select name="dia" class="form-select" required>
            <option value="">— Seleccionar —</option>
            @foreach($dias as $d)
                <option value="{{ $d }}" {{ old('dia', $horario->dia) == $d ? 'selected' : '' }}>{{ $d }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Turno</label>
        <select name="turno" class="form-select" required>
            @foreach($turnos as $key => $label)
                <option value="{{ $key }}" {{ old('turno', $horario->turno) == $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Hora inicio</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $horario->hora_inicio) }}" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label class="form-label">Hora fin</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin', $horario->hora_fin) }}" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label class="form-label">Necesita reserva</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="necesita_reserva" value="1" {{ old('necesita_reserva', $horario->necesita_reserva) ? 'checked' : '' }}>
            <label class="form-check-label">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="necesita_reserva" value="0" {{ old('necesita_reserva', $horario->necesita_reserva) === 0 ? 'checked' : '' }}>
            <label class="form-check-label">No</label>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        <button class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Crear' }}</button>
    </div>
</div>