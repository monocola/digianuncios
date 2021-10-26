<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Clicksurl;
use App\Message;
use App\Ticket;
use App\Vistos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VistosController extends Controller
{
   public function index($id){

       $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
       $cantidad = Anuncio::where('estado',0)->count();
       $vistos = Vistos::where('anuncio_id', $id)
                        ->where('user_propietary', Auth::user()->id)
                        ->orderBy('id', 'desc')
                        ->paginate(100);
       $anuncio = Anuncio::where('id','=',$id)->get();
       $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
       $notificaciones = Message::Usuario()->estado()->get();
       $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
       $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();

    return view('clientes.dashboard.vistos-anuncios')->with(compact('anuncio','misTickets','tickets_cantidad','vistos','anunciosMenu','cantidad','anunciosPendientes','notificaciones'));

   }

    public function visto($id,$id1){


        Vistos::create(['anuncio_id' => $id, 'user_id' => $id1, 'ip' => request()->ip(),'user_propietary' => $id1]);
        $info = "Hola";
        $anun_id = $id;
        $comentarios = 1;
        $anuncios = Anuncio::where('id','=',$id)->get();
        return back()->with(compact('info','comentarios', 'anuncios','anun_id'));

    }

    public function vistosUrl($id){


        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $cantidad = Anuncio::where('estado',0)->count();
        $cliks = Clicksurl::where('anuncio_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(100);
        $anuncio = Anuncio::where('id','=',$id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();


        return view('clientes.dashboard.clicksurl-anuncios')->with(compact('cliks','anuncio','misTickets','tickets_cantidad','anunciosMenu','cantidad','anunciosPendientes','notificaciones'));


    }
}
