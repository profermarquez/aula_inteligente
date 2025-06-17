<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    protected $fillable = ['nombre', 'estado', 'aula_id','es_proyector'];

    public function aula() { return $this->belongsTo(Aula::class); }
}
