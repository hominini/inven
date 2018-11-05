<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaBienesDeControlAdministrativo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_de_control_administrativo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 50)->nullable();
            $table->string('numero_de_serie')->nullable()->unique();
            $table->string('modelo')->nullable();
            $table->string('usuario_final')->nullable();//determinar desde donde van a ser obtenidos los usuarios
            $table->date('fecha_de_adquisicion')->nullable();
            $table->string('acta_de_recepcion')->nullable();
            $table->string('responsable')->nullable();
            $table->string('periodo_de_garantia')->nullable();
            $table->string('proveedor')->nullable();
            $table->string('estado')->nullable();
            //$table->string('clasificacion');
            $table->string('imagen')->nullable();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('bienes_de_control_administrativo');
    }
}
