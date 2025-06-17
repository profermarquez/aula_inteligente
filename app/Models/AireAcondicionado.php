<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
      protected $fillable = [
        'estado',
        'marca_modelo',
        'mantenimiento',
        'aula_id',            // FK al aula
    ];
    protected $casts = [
        'estado' => 'boolean',  // Guarda 0/1; quitar si usas texto
    ];

    public function aula() { return $this->belongsTo(Aula::class); }
    public function historiales() { return $this->hasMany(HistorialUsoAireAcondicionado::class); }
}
