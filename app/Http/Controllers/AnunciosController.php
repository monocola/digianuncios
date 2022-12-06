<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Categoria;
use App\Mail\NotificationNewAd;
use App\Message;
use App\Setting;
use App\Ticket;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Vistos;
use Mail;



class AnunciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // admin
    }

    public function index()
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncios = Anuncio::where('user_id','=',Auth::user()->id)->paginate(50);
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        return view('clientes.misanuncios.index')->with(compact('misTickets','tickets_cantidad','anuncios','anunciosMenu','anunciosPendientes','notificaciones'));
    }


    public function create()
    {

        //***************** INICIO  COUNTRY  **********************
        //SI USUARIO SE HA LOGEADO
        if(Auth::check()){
            $ipok = Setting::where('user_id', Auth::user()->id)->first();
            //SI NO EXISTE REGISTRO DE IP EN SETTING
            if($ipok === null){
                //Obtener IP y seleccionar el pais
                //$ip = '66.249.64.176'; //chile
                $ip = $_SERVER["REMOTE_ADDR"];
                $arr_ip = geoip()->getLocation($ip);
                $iso_code = $arr_ip->iso_code;

                //SI YA EXISTE REGISTRO DE IP EN SETTING
            }else{
                $ip = $ipok->ip;
                $iso_code = $ipok->country;
                //dd($iso_code);
            }



            //SI NO EXISTE USUARIO LOGEADO
        }else{

            //Obtener IP y seleccionar el pais
            //$ip = '66.249.64.176'; //chile
            $ip = $_SERVER["REMOTE_ADDR"];
            $arr_ip = geoip()->getLocation($ip);
            $iso_code = $arr_ip->iso_code;

        }

        //***************** FIN  COUNTRY  **********************


        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $categorias = Categoria::pais($iso_code)->get();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();

        //Obtener IP y seleccionar el pais
        //$ip = '183.81.13.94';
        $ip = $_SERVER["REMOTE_ADDR"];
        $arr_ip = geoip()->getLocation($ip);


        return view('clientes.misanuncios.create')->with(compact('arr_ip','misTickets','tickets_cantidad','categorias','anunciosMenu','anunciosPendientes','notificaciones'));
    }


    public function verCategorias(){


        //***************** INICIO  COUNTRY  **********************
        //SI USUARIO SE HA LOGEADO
        if(Auth::check()){
            $ipok = Setting::where('user_id', Auth::user()->id)->first();
            //SI NO EXISTE REGISTRO DE IP EN SETTING
            if($ipok === null){
                //Obtener IP y seleccionar el pais
                //$ip = '66.249.64.176'; //chile
                $ip = $_SERVER["REMOTE_ADDR"];
                $arr_ip = geoip()->getLocation($ip);
                $iso_code = $arr_ip->iso_code;

                //SI YA EXISTE REGISTRO DE IP EN SETTING
            }else{
                $ip = $ipok->ip;
                $iso_code = $ipok->country;
                //dd($iso_code);
            }



            //SI NO EXISTE USUARIO LOGEADO
        }else{

            //Obtener IP y seleccionar el pais
            //$ip = '66.249.64.176'; //chile
            $ip = $_SERVER["REMOTE_ADDR"];
            $arr_ip = geoip()->getLocation($ip);
            $iso_code = $arr_ip->iso_code;

        }

        //***************** FIN  COUNTRY  **********************




        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $categorias = Categoria::where('estatus',1)->pais($iso_code)->paginate(50);
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        return view('clientes.categorias.ver') ->with(compact('tickets_cantidad','misTickets','categorias','anunciosMenu','anunciosPendientes','notificaciones'));
    }


    public function store(Request $request)
    {



        $rules = [

            'category_name' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'distrito' => 'required',
            'provincia' => 'required',
            'departamento' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'archivo' => 'required|mimes:jpeg,bmp,png,jpg|max:3072',
            //'archivo' => 'required|mimes:jpeg,bmp,png,jpg|dimensions:max_width=370,max_height=475|max:3072',




        ];
        $messages = [
            'category_name.required' => 'La Categoría del anuncio no ha sido seleccionada.',
            'titulo.required' => 'El título del anuncio no ha sido ingresado.',
            'descripcion.required' => 'Es necesario ingresar alguna descripción del producto o servicio.',
            'direccion.required' => 'Es necesario ingresar la dirección.',
            'distrito.required' => 'Es necesario ingresar el distrito.',
            'provincia.required' => 'Es necesario ingresar la provincia.',
            'departamento.required' => 'Es necesario ingresar el departamento.',
            'telefono.required' => 'Es necesario ingresar algún teléfono para contactarse con su aviso.',
            'correo.required' => 'Es necesario ingresar el correo del aviso.',
            'archivo.required' => 'Es necesario ingresar el archivo del arte.',
            'archivo.mimes' => 'El tipo de archivo no es permitido, solamente puede subir archivos con extensión: jpg, png, jpeg.',
            'archivo.max' => 'El archivo supera el tamaño permitido de 3Mb.',
        ];
        $this->validate($request, $rules, $messages);


        $miAnuncio = new Anuncio();
        $miAnuncio->codigo = time();
        $miAnuncio->category_name = $request->input('category_name');
        $miAnuncio->titulo = $request->input('titulo');
        $miAnuncio->descripcion = $request->input('descripcion');
        $miAnuncio->direccion = $request->input('direccion');
        $miAnuncio->distrito = $request->input('distrito');
        $miAnuncio->provincia = $request->input('provincia');
        $miAnuncio->departamento = $request->input('departamento');
        $miAnuncio->pais = $request->input('pais');
        $miAnuncio->telefono = $request->input('telefono');
        $miAnuncio->correo = $request->input('correo');
        $miAnuncio->sitioweb = $request->input('sitioweb');
        $miAnuncio->facebook = $request->input('url_facebook');
        $miAnuncio->twitter = $request->input('url_twitter');
        $miAnuncio->instagram = $request->input('url_instagram');
        $miAnuncio->pinterest = $request->input('url_pinterest');
        $miAnuncio->aceptarterycond = $request->input('chTermYCond');
        $miAnuncio->codigomd5 = md5(time().mt_rand());
        $miAnuncio->correouser = Auth::user()->email;


        if($request->input('card')!= null){
          $miAnuncio->card = true;
        }

        if($request->input('delivery')!= null){
            $miAnuncio->delivery = true;
        }

        if($request->input('delivery_international')!= null){
            $miAnuncio->delivery_international = true;
        }


        $miAnuncio->ip = request()->ip();
        $miAnuncio->user_id = Auth::user()->id;
        $miAnuncio->estado = 0;


        if($request->file('archivo')){
            $file = $request->file('archivo');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/anuncios/', $nombre);
            $miAnuncio->banner = $nombre;
        }

        if(!$request->file('archivo')){
            $miAnuncio->banner = "Sin arte";
        }

        //Obtener IP y seleccionar el pais
        //$ip = '183.81.13.94';
        $ip = $_SERVER["REMOTE_ADDR"];
        $arr_ip = geoip()->getLocation($ip);


        Ubicacion::create([ 'distrito' => $request->input('distrito'),
                                'provincia' => $request->input('provincia'),
                                'departamento' => $request->input('departamento'),
                                'country' =>  strtolower($arr_ip->iso_code)
                                ]);

        $miAnuncio->save();



        Mail::to(Auth::user()->email)->send(new NotificationNewAd($miAnuncio));



        $notification = 'texto';
        return back()->with(compact('notification'));




    }


    public function show($id)
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncio = Anuncio::where('id','=',$id)->get();
        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        return view('clientes.misanuncios.show')->with(compact('misTickets','tickets_cantidad','anuncio','cantidad','anunciosMenu','anunciosPendientes','notificaciones'));
    }


    public function edit($id)
    {
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $anuncio = Anuncio::where('id','=',$id)->get();
        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        return view('clientes.misanuncios.edit')->with(compact('misTickets','tickets_cantidad','anuncio','cantidad','anunciosMenu','anunciosPendientes','notificaciones'));
    }


    public function update(Request $request, $id)
    {

        $miAnuncio = Anuncio::find($id);
        $miAnuncio->titulo = $request->input('titulo');
        $miAnuncio->descripcion = $request->input('descripcion');
        $miAnuncio->direccion = $request->input('direccion');
        $miAnuncio->distrito = $request->input('distrito');
        $miAnuncio->provincia = $request->input('provincia');
        $miAnuncio->departamento = $request->input('departamento');
        $miAnuncio->telefono = $request->input('telefono');
        $miAnuncio->correo = $request->input('correo');
        $miAnuncio->sitioweb = $request->input('sitioweb');
        $miAnuncio->facebook = $request->input('url_facebook');
        $miAnuncio->twitter = $request->input('url_twitter');
        $miAnuncio->instagram = $request->input('url_instagram');
        $miAnuncio->pinterest = $request->input('url_pinterest');
        $miAnuncio->ip = request()->ip();
        $miAnuncio->estado = 0;
        $miAnuncio->save();

        $notification = 'El anuncio ha sido actualizado correctamente, en breve procederemos a su revisión.';
        return back()->with(compact('notification'));
    }


    public function destroy($id)
    {
        $miAnuncio = Anuncio::find($id);

        if($miAnuncio->user_id == Auth::user()->id ){

            //aceptado
            $miAnuncio->delete();
            $notification = 'El anuncio ha sido Eliminado correctamente.';
            return back()->with(compact('notification'));

        }else{
            //no es propietario
            $notification2 = 'El anuncio no pudo ser eliminado.';
            return back()->with(compact('notification2'));


        }
    }




}
