<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Mail\NotificationMessage;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();

        $notificationsAll = Message::Usuario()
                                    ->orderBy('id', 'desc')
                                    ->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();


        return view('clientes.notifications.index')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','anunciosPendientes','notificaciones','notificationsAll'));
    }

    public function indexManager(Request $request)
    {


        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $usuarios = User::all();
        $notificacionesUser = "ninguno";

        $cantidad =  Message::Usuario()->count();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();

        return view('admin.notifications.index')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','anunciosPendientes','notificaciones','notificacionesUser','cantidad','usuarios'));
    }

    public function indexManagerQuery(Request $request)
    {
        $id = $request->input('usuario_id');

        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificacionesUser = Message::where('user_id', $id)->paginate(100);
        $notificaciones = Message::Usuario()->estado()->get();
        $usuarios = User::all();

        $cantidad =  Message::Usuario()->count();

        return view('admin.notifications.index')->with(compact('anuncios','anunciosMenu','anunciosPendientes','notificacionesUser','notificaciones','cantidad','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $usuarios = User::all();
        $notificaciones = Message::Usuario()->estado()->get();
        return view('admin.notifications.create')->with(compact('anuncios','anunciosMenu','anunciosPendientes','usuarios','notificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = new Message([
            'subject' => $request->get('asunto'),
            'body' => $request->get('mensaje'),
            'state' => 0,
            'user_id' => $request->get('usuario_id'),
            'ip' => request()->ip()
        ]);
        $message->save();



        $user = User::where('id', $request->input('usuario_id'))->first();
        Mail::to($user->email)->send(new NotificationMessage($message,$user));

        $notification = 'La Notificación al usuario fue enviada correctamente.';
        return back()->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificacion = Message::Usuario()
                                ->where('id', $id)
                                ->get();

        Message::where('id', $id)
            ->update(['state' => 1]);

        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        return view('clientes.notifications.show')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','anunciosPendientes','notificaciones','notificacion'));
    }

    public function showManager($id)
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificacion = Message::where('id', $id)
                                ->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        return view('admin.notifications.show')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','anunciosPendientes','notificaciones','notificacion'));
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
