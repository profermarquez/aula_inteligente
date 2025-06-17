<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $fillable = [ 'aula_id','fecha','hora','carrera','tipo_cursada','estado'];
     protected $table = 'disponibilidades';

    public function aula() {return $this->belongsTo(Aula::class);}
}
