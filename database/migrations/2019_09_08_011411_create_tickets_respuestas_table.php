<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_respuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("anuncio_id")->unsigned();
            $table->foreign("anuncio_id")->references("id")->on("anuncios");
            $table->bigInteger("ticket_relacionado")->unsigned();
            $table->foreign("ticket_relacionado")->references("id")->on("tickets");
            $table->text('mensaje');
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->String('ip');
            $table->Integer('tipo');
            $table->Integer('estado');
            $table->bigInteger('response_user_id');
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
        Schema::dropIfExists('tickets_respuestas');
    }
}
