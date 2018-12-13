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
            $table->text('descripcion')->nullable();
            $table->enum('clase',['CONTROL ADMINISTRATIVO', 'PROPIEDAD, PLANTA Y EQUIPO']);
            $table->integer('id_usuario_final')->nullable(); // Referencia a otra tabla
            $table->integer('id_responsable')->nullable();   // Referencia a otra tabla
            $table->date('fecha_de_adquisicion')->nullable();
            $table->binary('acta_de_recepcion')->nullable();
            $table->binary('imagen')->nullable();
            $table->text('observaciones')->nullable();
            $table->decimal('valor', 8, 2)->nullable();
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
