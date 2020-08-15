<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaItemsBibliograficos extends Migration
{
    public function up()
    {
        Schema::create('items_bibliograficos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bien_control_administrativo');
            $table->integer('id_tipo_de_bien')->nullable();
            $table->string('autor')->nullable();
            $table->string('detalles_de_publicacion')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items_bibliograficos');
    }
}
