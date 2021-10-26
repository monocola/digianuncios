<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliksUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliks_url', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("anuncio_id")->unsigned();
            $table->foreign("anuncio_id")->references("id")->on("anuncios");
            $table->String('ip');
            $table->Integer('user_propietary');
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
        Schema::dropIfExists('cliks_url');
    }
}
