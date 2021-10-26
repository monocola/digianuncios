<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Anuncio;
use App\Categoria;
use App\Clicksurl;
use App\Comentario;
use App\Message;
use App\Ticket;
use App\User;
use App\Vistos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::inRandomOrder()->paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $misTickets = Ticket::orderBy('id','desc')->paginate(50);
        $tickets_cantidad = Ticket::count();

        $anunciosPendientes = Anuncio::Pendiente()->get();
        $notificaciones = Message::all();

        //dashboard
        $consults= Analytic::all()->count();
        $comments= Comentario::all()->count();
        $views= Vistos::all()->count();
        $tickets= Ticket::all()->count();
        $ads =  Anuncio::where('estado',1)->count();
        $users= User::all()->count();

        $usersAll = User::orderBy('id','desc')->paginate(10);

        return view('admin.panel')->with(compact('usersAll','tickets_cantidad','users','ads','tickets','views','comments','consults','anuncios','cantidad','misTickets','anunciosPendientes','notificaciones'));

    }
}
