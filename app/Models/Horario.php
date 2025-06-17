<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'periodo',
        'hora_inicio',
        'hora_fin',
        'turno',
        'dia',
        'necesita_reserva',
    ];

    // Relaciones (si aplican)
    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
