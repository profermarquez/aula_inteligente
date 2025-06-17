<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['nombre', 'carrera', 'tipo_cursada', 'docente_id','anio'];

    public function docente() { return $this->belongsTo(Docente::class); }
    public function reservas() { return $this->hasMany(Reserva::class); }
    public function horarios() { return $this->belongsToMany(Horario::class); }
}
