<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('lastname');
            $table->string('phone');
            $table->string('country');
            $table->date('birthdate');
            $table->boolean('state');
            $table->integer('tipo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->ipAddress('visitor');
            $table->string('avatar')->nullable();
            $table->integer('level')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
