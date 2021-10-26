<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Anuncio;
use App\Categoria;
use App\Comentario;
use App\Message;
use App\Ticket;
use App\TicketRespuesta;
use App\Ubicacion;
use App\User;
use App\Vistos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function blocked()
    {
        if(Auth::user()->state == 1){

            return view('blocked');

        }else {

            if (Auth::user()->tipo == 2) {

                //dd(Auth::user()->id);

                $anunciosMenu = Anuncio::where('user_id', '=', Auth::user()->id)->paginate(3);
                $cantidad = Anuncio::where('estado', 0)->count();

                $misTickets = Ticket::where('user_id', '=', Auth::user()->id)->where('estado', 0)->orderBy('id', 'DESC')->get();


                //CANTIDAD DE TICKETS
                $tickets_cantidad = Ticket::where('user_id', '=', Auth::user()->id)->where('estado', 0)->orderBy('id', 'DESC')->count();


                $cantidad_mis_anuncios_activos = Anuncio::where('estado', 1)
                    ->where('user_id', '=', Auth::user()->id)
                    ->count();

                $cantidad_mis_anuncios_inactivos = Anuncio::where('estado', 0)
                    ->where('user_id', '=', Auth::user()->id)
                    ->count();

                $cantidad_comentarios = Comentario::where('user_propietary', Auth::user()->id)->count();

                $anuncios = Anuncio::where('user_id', '=', Auth::user()->id)
                    ->withCount(['comentarios'])
                    ->paginate(10);

                $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();

                $notificaciones = Message::Usuario()->estado()->get();


                return view('home')->with(compact('anunciosMenu', 'cantidad', 'cantidad_mis_anuncios_activos', 'cantidad_mis_anuncios_inactivos', 'cantidad_comentarios', 'anuncios', 'misTickets', 'tickets_cantidad', 'anunciosPendientes', 'notificaciones'));

            }elseif (Auth::user()->tipo == 8355023){


            $anuncios = Anuncio::inRandomOrder()->paginate(50);
            $cantidad = Anuncio::where('estado', 0)->count();
            $misTickets = Ticket::orderBy('id', 'desc')->paginate(50);
            $tickets_cantidad = Ticket::count();

            $anunciosPendientes = Anuncio::Pendiente()->get();
            $notificaciones = Message::all();

            //dashboard
            $consults = Analytic::all()->count();
            $comments = Comentario::all()->count();
            $views = Vistos::all()->count();
            $tickets = Ticket::all()->count();
            $ads = Anuncio::where('estado', 1)->count();
            $users = User::all()->count();

            $usersAll = User::orderBy('id', 'desc')->paginate(10);


            return view('admin.panel')->with(compact('usersAll', 'tickets_cantidad', 'users', 'ads', 'tickets', 'views', 'comments', 'consults', 'anuncios', 'cantidad', 'misTickets', 'anunciosPendientes', 'notificaciones'));


        }else{

                $categorias = Categoria::get();
                $ubicaciones = Ubicacion::get();
                $comentarios = Comentario::orderBy('id','desc')->get();
                $anuncios = Anuncio::where('estado',2000)
                    ->withCount(['comentarios'])
                    ->inRandomOrder()->paginate(150);


                return view('welcome')->with(compact('anuncios','comentarios','categorias','ubicaciones'));

            }


        }


    }


    public function index()
    {


        if(Auth::user()->tipo == 2){

            //dd(Auth::user()->id);

            $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
            $cantidad = Anuncio::where('estado',0)->count();

            $misTickets = Ticket::where('user_id','=',Auth::user()->id)->where('estado',0)->orderBy('id','DESC')->get();


            //CANTIDAD DE TICKETS
            $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->where('estado',0)->orderBy('id','DESC')->count();


            $cantidad_mis_anuncios_activos = Anuncio::where('estado',1)
                                ->where('user_id','=',Auth::user()->id)
                                ->count();

            $cantidad_mis_anuncios_inactivos = Anuncio::where('estado',0)
                                ->where('user_id','=',Auth::user()->id)
                                ->count();

            $cantidad_comentarios = Comentario::where('user_propietary',Auth::user()->id )->count();

            $anuncios = Anuncio::where('user_id','=',Auth::user()->id)
                                ->withCount(['comentarios'])
                                ->withCount(['cliks'])
                                ->paginate(10);

            $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();

            $notificaciones = Message::Usuario()->estado()->get();

            $level1 = User::where('id',Auth::user()->id)->first();
            $level = $level1->level;



            return view('home')->with(compact('level','anunciosMenu','cantidad','cantidad_mis_anuncios_activos','cantidad_mis_anuncios_inactivos','cantidad_comentarios','anuncios','misTickets','tickets_cantidad','anunciosPendientes','notificaciones'));

        }else{

            $categorias = Categoria::get();
            $ubicaciones = Ubicacion::get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where('estado',2000)
                ->withCount(['comentarios'])
                ->inRandomOrder()->paginate(150);

            $result = -2;
            return view('welcome')->with(compact('result','anuncios','comentarios','categorias','ubicaciones'));

        }

    }
}
