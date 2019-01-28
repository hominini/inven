<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAsignaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('asignaciones', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('id_usuario_final');
             $table->integer('id_bien');
             $table->boolean('activa')->default(0);
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
         Schema::dropIfExists('asignaciones');
     }
}
