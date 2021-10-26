<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('codigo');
            $table->String('titulo');
            $table->text('descripcion');
            $table->text('direccion');
            $table->String('distrito');
            $table->String('provincia');
            $table->String('departamento');
            $table->String('pais');
            $table->String('telefono');
            $table->String('sitioweb')->nullable();
            $table->String('facebook')->nullable();
            $table->String('twitter')->nullable();
            $table->String('instagram')->nullable();
            $table->String('pinterest')->nullable();
            $table->String('correo')->nullable();
            $table->String('correouser')->nullable(); //correo del usuario
            $table->String('banner');
            $table->boolean('estado');
            $table->boolean('comentario')->default(false);
            $table->String('ip')->nullable();
            $table->String("category_name");
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::dropIfExists('anuncios');
    }
}
