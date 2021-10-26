<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Comentario;
use App\Message;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

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

        $query= $request->input('comentario');

        if($query == null){
            return back();
        }

        $comentario = new Comentario();
        $comentario->anuncio_id = $request->input('anuncio_id');
        $comentario->comentario = $request->input('comentario');
        $comentario->ip = request()->ip();
        $comentario->user_id = Auth::user()->id;
        $comentario->estado = 1;

        $idUser_propietary = Anuncio::where('id', $request->input('anuncio_id'))->get();

        foreach ($idUser_propietary as $us){
            $user_prop = $us->user_id;
        }

        $comentario->user_propietary = $user_prop;

        $comentario->save();
        $textoAlerta = 'Éxito, Su comentario fue publicado satisfactóriamente.';
        $comentarios = Comentario::orderBy('id','desc')->get();
        $anuncios = Anuncio::withCount(['comentarios'])
            ->inRandomOrder()->paginate(50);
        $anun_id = $request->input('anuncio_id');

       $anu_comen = Comentario::where('anuncio_id', $anun_id);


       if($anu_comen->count()==0) {
           Anuncio::where('id', $anun_id)
               ->update(['comentario' => false]);
       }else{
           Anuncio::where('id', $anun_id)
               ->update(['comentario' => true]);

       }


        return back()->with(compact('textoAlerta','comentarios', 'anuncios','anun_id'));


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
    public function destroy($id,$aid)
    {
        $comentario = Comentario::find($id);
        $comentario->delete();

        $textoAlerta = 'Éxito, Su comentario fue Eliminado satisfactóriamente.';
        $comentarios = Comentario::orderBy('id','desc')->get();
        $anuncios = Anuncio::withCount(['comentarios'])
            ->inRandomOrder()->paginate(50);
        $anun_id = $aid;

        $anu_comen = Comentario::where('anuncio_id', $anun_id);

        if($anu_comen->count()==0) {
                        Anuncio::where('id', $anun_id)
                            ->update(['comentario' => false]);
        }else{
                        Anuncio::where('id', $anun_id)
                            ->update(['comentario' => true]);

        }



        return back()->with(compact('textoAlerta','comentarios', 'anuncios','anun_id'));

    }

    public function comentarios($id)
    {

        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $comentario = Comentario::Anuncio($id)
                                ->orderBy('id', 'desc')
                                ->Usuario()->get();

        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        $anuncio = Anuncio::where('id','=',$id)->get();

        return view('clientes.dashboard.comentarios-anuncio',compact('anuncio','misTickets','tickets_cantidad','anunciosMenu','comentario','anunciosPendientes','notificaciones'));
    }

    public function delete($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        $success = 'Comentario eliminado Correctamente.';
        return back()->with(compact('success','comentarios', 'anuncios','anun_id'));

    }


}
