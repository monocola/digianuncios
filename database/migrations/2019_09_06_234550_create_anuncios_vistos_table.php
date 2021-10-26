<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosVistosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios_vistos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("anuncio_id")->unsigned();
            $table->foreign("anuncio_id")->references("id")->on("anuncios");
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->String('ip')->nullable();
            $table->bigInteger("user_propietary")->unsigned();
            $table->foreign("user_propietary")->references("id")->on("users");
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
        Schema::dropIfExists('anuncios_vistos');
    }
}
