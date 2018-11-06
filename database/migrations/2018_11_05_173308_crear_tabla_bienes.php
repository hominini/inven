<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaBienes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ubicacion')->nullable();
            $table->string('nombre');
            $table->string('clase');
            $table->string('codigo', 50)->nullable();
            $table->string('usuario_final')->nullable();//determinar desde donde van a ser obtenidos los usuarios
            $table->date('fecha_de_adquisicion')->nullable();
            $table->string('acta_de_recepcion')->nullable();
            $table->string('responsable')->nullable();
            $table->string('periodo_de_garantia')->nullable();
            $table->string('estado')->nullable();
            $table->string('imagen')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('fecha_de_caducidad')->nullable();
            $table->string('peligrosidad')->nullable();
            $table->string('manejo_especial')->nullable();
            $table->double('valor_unitario', 8, 2)->nullable();
            $table->string('tiempo_de_vida_util')->nullable();
            $table->string('tipo_de_actividad')->nullable();
            $table->boolean('en_uso')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bienes');
    }
}
