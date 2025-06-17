<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('periodo'); // Ej: "2025-1"
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('turno'); // Ej: "Mañana"
            $table->string('dia');   // Ej: "Lunes"
            $table->boolean('necesita_reserva')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
