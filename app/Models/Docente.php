<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = ['dni', 'nombre', 'especialidad'];

    public function materias() { return $this->hasMany(Materia::class); }
    public function reservasSolicitadas() { return $this->hasMany(Reserva::class, 'docente_id'); }
}
