<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInventarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ubicacion')->nullable();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->date('fecha_de_adquisicion')->nullable();
            $table->double('valor_unitario', 8, 2)->nullable();
            $table->integer('cantidad');
            $table->integer('id_usuario_final')->nullable(); // Referencia a otra tabla
            $table->integer('id_tipo')->nullable();   // Referencia a otra tabla
            $table->binary('acta_de_recepcion')->nullable();
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('inventarios');
    }
}
