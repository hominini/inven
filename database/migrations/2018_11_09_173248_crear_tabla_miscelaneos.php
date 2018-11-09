<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMiscelaneos extends Migration
{
    public function up()
    {
        Schema::create('miscelaneos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bien');
            $table->integer('id_tipo_de_bien');
        });
    }

    public function down()
    {
        Schema::dropIfExists('miscelaneos');
    }
}
