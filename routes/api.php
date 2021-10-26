<?php

use App\Anuncio;
use App\Categoria;
use App\Comentario;
use App\Ubicacion;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::get('/anuncios', function(){

     $categorias = Categoria::get();
     $ubicaciones = Ubicacion::get();
     $comentarios = Comentario::orderBy('id','desc')->get();

     $anuncios = Anuncio::where('estado',1)
         ->withCount(['comentarios'])
         ->inRandomOrder()->paginate(20);

     //return $anuncios->compact('anuncios','comentarios','categorias','ubicaciones');

     return response()->json(['anuncios'=> $anuncios, 'categorias' => $categorias, 'ubicaciones' => $ubicaciones, 'comentarios' => $comentarios ]);
 });
