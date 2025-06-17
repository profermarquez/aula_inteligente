<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAireAcondicionadosTable extends Migration
{
    public function up()
    {
        Schema::create('aire_acondicionados', function (Blueprint $table) {
             $table->id();

            // FK al aula
            $table->foreignId('aula_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->boolean('estado')->default(false);      // 0 = Apagado
            $table->string('marca_modelo');
            $table->string('mantenimiento')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aire_acondicionados');
    }
}
