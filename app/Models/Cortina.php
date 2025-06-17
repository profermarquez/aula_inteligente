<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cortina extends Model
{
    protected $fillable = ['ubicacion', 'estado', 'aula_id'];

    public function aula() { return $this->belongsTo(Aula::class); }
}
