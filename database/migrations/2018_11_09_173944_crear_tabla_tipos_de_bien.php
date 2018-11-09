<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTiposDeBien extends Migration
{
    public function up()
    {
        Schema::create('tipos_de_bien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_de_bien');
    }
}
