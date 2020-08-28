<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionesTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->integer('id_ubicacion');
            $table->text('descripcion')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('completada');
            $table->enum('tipo', [
                'REGISTRO',
                'CONTEO',
                'BAJAS',
            ]);
            $table->dateTime('fecha_asignacion');
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
        Schema::dropIfExists('asignaciones_tareas');
    }
}
