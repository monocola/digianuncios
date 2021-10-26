<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use App\User;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'descripcion' => $faker->paragraph,
        'estatus' => 1,
        'user_id'=>User::all()->random()->id,

    ];
});
