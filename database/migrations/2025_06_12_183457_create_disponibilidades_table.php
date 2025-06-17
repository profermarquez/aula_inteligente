<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadesTable extends Migration
{
    public function up()
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora');
            $table->string('carrera');
            $table->string('tipo_cursada');
            $table->string('estado'); // ej: disponible, ocupado, reservado, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disponibilidades');
    }
}
