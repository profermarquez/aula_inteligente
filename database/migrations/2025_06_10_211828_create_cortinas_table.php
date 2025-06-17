<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCortinasTable extends Migration
{
    public function up()
    {
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion');
            $table->string('estado');
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cortinas');
    }
}
