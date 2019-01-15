<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuariosFinales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_finales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento_identificacion')->unique();
            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
        });
    }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
    public function down()
    {
        Schema::dropIfExists('usuarios_finales');
    }
}
