<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleTareaCompletada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_tarea_completada', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_asignacion_tarea');
            $table->dateTime('fechaHoraInicio');
            $table->dateTime('fechaHoraFin');
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
        Schema::dropIfExists('detalle_tarea_completada');
    }
}
