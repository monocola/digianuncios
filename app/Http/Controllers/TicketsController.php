<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Message;
use App\Ticket;
use App\TicketRespuesta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
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
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->paginate(50);
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->where('estado',0)->orderBy('id','DESC')->count();

        return view('clientes.tickets.index')->with(compact('tickets_cantidad','anuncios','anunciosMenu','misTickets','anunciosPendientes','notificaciones'));

    }

    public function indexAdmin()
    {

        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(50);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $misTickets = Ticket::orderBy('id','desc')->paginate(50);
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::count();

        return view('admin.tickets.index')->with(compact('tickets_cantidad','anuncios','anunciosMenu','misTickets','anunciosPendientes','notificaciones'));

    }



    public function create()
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();

        return view('clientes.tickets.create')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','anunciosPendientes','notificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = [

            'tipo' => 'required',
            'asunto' => 'required',
            'anuncio_relacionado' => 'required',
            'prioridad' => 'required',
            'mensaje' => 'required',

        ];
        $messages = [
            'tipo.required' => 'El tipo del Ticket no ha sido seleccionado.',
            'asunto.required' => 'El asunto del ticket no ha sido ingresado.',
            'anuncio_relacionado.required' => 'El anuncio relacionado del Ticket no ha sido seleccionado.',
            'prioridad.required' => 'La prioridad del Ticket no ha sido seleccionado.',
            'mensaje.required' => 'Es necesario ingresar el mensaje.',

        ];
        $this->validate($request, $rules, $messages);

        $miTicket = new Ticket();
        $miTicket->tipo = $request->input('tipo');
        $miTicket->codigo = rand(1000000, 9999999);
        $miTicket->asunto = $request->input('asunto');
        $miTicket->anuncio_id = $request->input('anuncio_relacionado');
        $miTicket->prioridad = $request->input('prioridad');
        $miTicket->mensaje = $request->input('mensaje');
        $miTicket->user_id = Auth::user()->id;
        $miTicket->ip = request()->ip();
        $miTicket->estado = 0; //pendiente

        $miTicket->save();

        $notification = 'Éxito, su ticket fue enviado satisfactóriamente. ';
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
        $miTicket = Ticket::where('codigo', $id)->get();

        foreach ($miTicket as $key => $mtk){
            $idT = $mtk->id;
            $codigo = $mtk->codigo;

        }
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $respuestas = TicketRespuesta::where('ticket_relacionado','=',$idT)->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();



        return view('clientes.tickets.ver')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','miTicket','respuestas','anunciosPendientes','notificaciones'));


    }

    public function showAdmin($id)
    {

        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->get();
        $miTicket = Ticket::where('codigo', $id)->get();

        foreach ($miTicket as $key => $mtk){
            $idT = $mtk->id;
        }
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $respuestas = TicketRespuesta::where('ticket_relacionado','=',$idT)->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        return view('admin.tickets.ver')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','miTicket','respuestas','anunciosPendientes','notificaciones'));


    }

    public function responderTicket(Request $request)
    {

        $id = $request->input('ticket_relacionado');
        $TicketMain = Ticket::where('id', $id)->first();

        $miTicketResp = new TicketRespuesta();
        $miTicketResp->anuncio_id = $request->input('anuncio_relacionado');
        $miTicketResp->ticket_relacionado = $request->input('ticket_relacionado');
        $miTicketResp->mensaje = $request->input('mensaje');
        $miTicketResp->user_id = Auth::user()->id;
        $miTicketResp->ip = request()->ip();
        $miTicketResp->tipo = $request->input('tipo');
        $miTicketResp->estado = 0;
        $miTicketResp->response_user_id = $TicketMain->user_id;
        $miTicketResp->save();

        Ticket::where('id', $miTicketResp->ticket_relacionado)
            ->update(['estado' => 2]);

        $notification = 'Éxito, La respuesta a su ticket fue enviado satisfactóriamente. ';
        return back()->with(compact('notification'));

    }


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
