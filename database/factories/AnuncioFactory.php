<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anuncio;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Categoria;
use App\User;

$factory->define(Anuncio::class, function (Faker $faker) {
    return [
        'codigo' => $faker->randomNumber(8),
        'titulo' => $faker->name,
        'descripcion' => $faker->text(100),
        'direccion' =>$faker->address,
        'distrito' =>$faker->state,
        'provincia' =>$faker->citySuffix,
        'departamento' =>$faker->city,
        'pais' => 'PE',
        'telefono' => $faker->phoneNumber,
        'sitioweb' =>$faker->url,
        'facebook' =>$faker->url,
        'twitter' =>$faker->url,
        'instagram' =>$faker->url,
        'pinterest' =>$faker->url,
        'correo' =>$faker->companyEmail,
        'banner' => $faker->image('public/anuncios',370,475,'business',false),
        'estado' => 1,
        'ip' => $faker->ipv4,
        'category_name' => Categoria::all()->random()->name,
        'user_id' =>User::all()->random()->id,
        'aceptarterycond' => 1,
        'codigomd5' => $faker->md5,
    ];
});
