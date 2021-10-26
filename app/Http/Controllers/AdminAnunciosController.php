<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Categoria;
use App\Mail\NotificationAdAcepted;
use App\Message;
use App\Ticket;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class AdminAnunciosController extends Controller
{

    public function index()
    {
        $anuncios = Anuncio::paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->get();
        return view('admin.anuncios.index')->with(compact('anuncios','cantidad','anunciosPendientes'));
    }

    public function anunciosAprobados()
    {
        $anuncios = Anuncio::where('estado',1)->paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->get();
        return view('admin.anuncios.index')->with(compact('anuncios','cantidad','anunciosPendientes'));
    }

    public function anunciosPendientes()
    {
        $anuncios = Anuncio::where('estado',0)->paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->get();
        return view('admin.anuncios.index')->with(compact('anuncios','cantidad','anunciosPendientes'));
    }

    public function anunciosRechados()
    {
        $anuncios = Anuncio::where('estado',2)->paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->get();
        return view('admin.anuncios.index')->with(compact('anuncios','cantidad','anunciosPendientes'));
    }



    public function create()
    {
        $categorias = Categoria::get();
        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->get();

        //Obtener IP y seleccionar el pais
        //$ip = '183.81.13.94';
        $ip = $_SERVER["REMOTE_ADDR"];
        $arr_ip = geoip()->getLocation($ip);

        return view('admin.anuncios.create')->with(compact('arr_ip','anunciosPendientes','categorias','cantidad'));
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
            'archivo' => 'required|mimes:jpeg,bmp,png,jpg|dimensions:max_width=370,max_height=475|max:3072',




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


        $miAnuncio->ip = request()->ip();
        $miAnuncio->user_id = Auth::user()->id;
        $miAnuncio->estado = 0;


        if($request->input('card')!= null){
            $miAnuncio->card = true;
        }

        if($request->input('delivery')!= null){
            $miAnuncio->delivery = true;
        }

        if($request->input('delivery_international')!= null){
            $miAnuncio->delivery_international = true;
        }


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
            'country' =>  $request->input('pais')
        ]);

        $miAnuncio->save();
        $notification = 'texto';
        return back()->with(compact('notification'));
    }


    public function show($id)
    {
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $anuncio = Anuncio::where('id','=',$id)->get();
        $cantidad = Anuncio::where('estado',0)->count();

        return view('admin.anuncios.show')->with(compact('anunciosPendientes','anuncio','cantidad'));
    }


    public function aprobar($id, Request $request){


        Anuncio::where('codigomd5', $id)
                        ->update(['estado' => 1]);

            $miAnuncio = Anuncio::where('codigomd5', $id)->first();
            Mail::to($miAnuncio->correouser)->send(new NotificationAdAcepted($miAnuncio));


        $textoAlerta = 'Éxito, El Anuncio ha sido APROBADO.';
        return back()->with(compact('textoAlerta'));

    }

    public function rechazar($id, Request $request){


        Anuncio::where('codigomd5', $id)
            ->update(['estado' => 2]);

        $textoAlerta = 'Éxito, El Anuncio ha sido RECHAZADO.';
        return back()->with(compact('textoAlerta'));

    }

    public function query(Request $request)
    {
        if(!$request->input('query')){
            $anuncios = Anuncio::paginate(50);
            $cantidad = Anuncio::where('estado',0)->count();
            $anunciosPendientes = Anuncio::Pendiente()->get();

            return view('admin.anuncios.index')->with(compact('anuncios','cantidad','anunciosPendientes'));

        }else{

            $codigo = $request->input('query');
            $anuncios = Anuncio::where('codigo', $codigo)
                                ->orwhere('correo', 'LIKE', '%'.$codigo.'%')
                                ->orwhere('titulo', 'LIKE', '%'.$codigo.'%')
                                ->paginate();

            $cantidad = Anuncio::where('estado',0)->count();
            $anunciosPendientes = Anuncio::Pendiente()->get();
            return view('admin.anuncios.index')->with(compact('anuncios','cantidad','anunciosPendientes'));
        }
    }



    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
