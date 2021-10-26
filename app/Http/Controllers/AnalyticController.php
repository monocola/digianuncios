<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Anuncio;
use App\Message;
use App\Ticket;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(50);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $misTickets = Ticket::orderBy('id','desc')->paginate(50);
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::count();


        $count = DB::table('analytics')
            ->join('categorias', 'categorias.id', '=', 'analytics.categoria_id')
            ->select(DB::raw('categorias.nombre, count(*) as num, categoria_id'))
            ->groupBy('categoria_id')
            ->orderBy('num', 'desc')
            ->get();


        return view('admin.analytics.index')->with(compact('count','tickets_cantidad','anuncios','anunciosMenu','misTickets','anunciosPendientes','notificaciones'));

    }

    public function adAnalytic()
    {

        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(50);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $misTickets = Ticket::orderBy('id','desc')->paginate(50);
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::count();


        $count = DB::table('anuncios_vistos')
                    ->join('users', 'users.id', '=', 'anuncios_vistos.user_propietary')
                    ->join('anuncios', 'anuncios.id', '=', 'anuncios_vistos.anuncio_id')
                    ->select(DB::raw('count(anuncio_id) as num, anuncios_vistos.anuncio_id, anuncios_vistos.user_propietary, anuncios.titulo, users.lastname, users.name, users.country, users.phone, users.birthdate, users.email, users.created_at, users.level, users.avatar'))
                    ->groupBy('anuncio_id')
                    ->get();



        //dd($count);

        return view('admin.analytics.add')->with(compact('count','tickets_cantidad','anuncios','anunciosMenu','misTickets','anunciosPendientes','notificaciones'));

    }


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
