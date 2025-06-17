<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['aula_id', 'materia_id', 'horario_id', 'fecha', 'hora_inicio', 'hora_fin', 'origen', 'estado', 'docente_id'];

    public function aula() { return $this->belongsTo(Aula::class); }
    public function materia() { return $this->belongsTo(Materia::class); }
    public function horario() { return $this->belongsTo(Horario::class); }
    public function docente() { return $this->belongsTo(Docente::class); }
    public function historialFocos() { return $this->hasMany(HistorialFoco::class); }
    public function historialAires() { return $this->hasMany(HistorialUsoAireAcondicionado::class); }
}
