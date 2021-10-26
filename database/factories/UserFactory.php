<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the modelo.blade.php factory definitions for
| your application. Factories provide a convenient way to generate new
| modelo.blade.php instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'lastname' => $faker->firstName,
        'phone' => $faker->phoneNumber,
        'country' => 'pe',
        'birthdate' => $faker->date('Y-m-d'),
        'state' => 0,
        'tipo' => $faker->numberBetween(0,2),
        'visitor' => $faker->ipv4,
        'avatar' => 'defaul-avatar.png',
    ];
});
