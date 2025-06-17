<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialUsoAireAcondicionado extends Model
{
    protected $fillable = ['reserva_id', 'aire_acondicionado_id', 'temperatura', 'fecha'];

    public function reserva() { return $this->belongsTo(Reserva::class); }
    public function aireAcondicionado() { return $this->belongsTo(AireAcondicionado::class); }
}
