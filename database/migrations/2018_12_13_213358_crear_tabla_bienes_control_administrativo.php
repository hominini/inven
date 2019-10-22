<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaBienesControlAdministrativo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_control_administrativo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bien');
            $table->string('codigo')->unique()->nullable();
            $table->integer('periodo_de_garantia')->nullable();
            $table->string('estado')->nullable();
            $table->string('caducidad')->nullable();
            $table->string('peligrosidad')->nullable();
            $table->text('manejo_especial')->nullable();
            $table->integer('vida_util')->nullable();
            $table->integer('id_actividad')->nullable(); // Referencia a otra tabla
            $table->boolean('en_uso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bienes_control_administrativo');
    }
}
