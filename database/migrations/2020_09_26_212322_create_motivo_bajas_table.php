<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotivoBajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_bajas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_asignacion_tarea');
            $table->integer('id_bien');
            $table->text('motivo');
            $table->string('ruta_imagen')->nullable();
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
        Schema::dropIfExists('motivo_bajas');
    }
}
