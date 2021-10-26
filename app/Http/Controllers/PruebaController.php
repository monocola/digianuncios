<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Categoria;
use App\Comentario;
use App\Ubicacion;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Si no existen parametros de buscar y ubicacion
        if(empty($query1) && empty($query2)){

            $categorias = Categoria::get();
            $ubicaciones = Ubicacion::get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::withCount(['comentarios'])
                ->inRandomOrder()
                ->paginate(50);
            return view('welcome')->with(compact('anuncios','comentarios','categorias','ubicaciones'));
        }

        //Si  existen parametros de buscar, ubicacion Y soloperu y concomentarios
        if(!empty($query1) && !empty($query2) && isset($soloperu) && isset($concomen) ){


            $categorias = Categoria::get();
            $ubicaciones = Ubicacion::get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::withCount(['comentarios'])
                ->inRandomOrder()
                ->where([
                    ['categoria_id', $query1],
                    ['pais', "PE"],
                    ['comentario', true],
                    ['distrito', 'like',"%$query2%"]])
                ->orWhere('departamento',"%$query2%" )
                ->Paginate(50);

            return view('welcome')->with(compact('anuncios','comentarios','categorias','ubicaciones'));


        }

        //Si existe parametro solamente de buscar
        if(!empty($query1) && empty($query2)){

            $categorias = Categoria::get();
            $ubicaciones = Ubicacion::get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::withCount(['comentarios'])
                ->inRandomOrder()
                ->where([['categoria_id', $query1]])
                ->Paginate(50);

            return view('welcome')->with(compact('anuncios','comentarios','categorias','ubicaciones'));


        }

        //Si  existen parametros de buscar, ubicacion
        if(!empty($query1) && !empty($query2)){


            $categorias = Categoria::get();
            $ubicaciones = Ubicacion::get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::withCount(['comentarios'])
                ->inRandomOrder()
                ->where([
                    ['categoria_id', $query1],
                    ['distrito', 'like',"%$query2%"]])
                ->orWhere('departamento',"%$query2%" )
                ->Paginate(50);

            return view('welcome')->with(compact('anuncios','comentarios','categorias','ubicaciones'));


        }




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
