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
            $table->enum('clase',['CONTROL ADMINISTRATIVO', 'PROPIEDAD, PLANTA Y EQUIPO']);
            $table->string('codigo')->nullable();
            $table->string('id_usuario_final')->nullable(); // Referencia a otra tabla
            $table->date('fecha_de_adquisicion')->nullable();
            $table->binary('acta_de_recepcion')->nullable();
            $table->string('id_responsable')->nullable();   // Referencia a otra tabla
            $table->decimal('periodo_de_garantia', 8, 2)->nullable();
            $table->string('estado')->nullable();
            $table->binary('imagen')->nullable();
            $table->text('observaciones')->nullable();
            $table->date('fecha_de_caducidad')->nullable();
            $table->string('peligrosidad')->nullable();
            $table->text('manejo_especial')->nullable();
            $table->double('valor_unitario', 8, 2)->nullable();
            $table->integer('tiempo_de_vida_util')->nullable();
            $table->string('id_tipo_de_actividad')->nullable(); // Referencia a otra tabla
            $table->boolean('en_uso')->nullable();
            $table->text('descripcion')->nullable();
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
