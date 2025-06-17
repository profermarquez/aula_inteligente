<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{
    protected $fillable = ['reserva_id', 'foco_id', 'intensidad', 'fecha'];

    public function reserva() { return $this->belongsTo(Reserva::class); }
    public function foco() { return $this->belongsTo(Foco::class); }
}
