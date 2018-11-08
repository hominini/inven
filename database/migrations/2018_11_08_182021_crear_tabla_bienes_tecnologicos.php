<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaBienesTecnologicos extends Migration
{
    public function up()
    {
        Schema::create('bienes_tecnologicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bien');
            $table->integer('id_tipo_de_bien');
            $table->string('numero_de_serie')->nullable();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->string('proveedor')->nullable();
            $table->text('software_asociado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bienes_tecnologicos');
    }
}
