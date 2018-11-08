<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMuebles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muebles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bien');
            $table->integer('id_tipo_de_bien');
            $table->string('color')->nullable();
            $table->string('dimensiones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muebles');
    }
}
