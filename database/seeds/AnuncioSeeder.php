<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Anuncio;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Anuncio::class,40)->create();
    }
}
