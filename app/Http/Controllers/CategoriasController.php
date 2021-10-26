<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Categoria;
use App\Message;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // admin
    }

    public function index()
    {

        $categorias = Categoria::orderBy('name','ASC')->paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $titulo = "LISTADO DE CATEGORÍAS";
        $subtitulo = "Categorías Registradas";
        $anunciosPendientes = Anuncio::Pendiente()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();

        return view('admin.categorias.index') ->with(compact('tickets_cantidad','categorias','cantidad','titulo','subtitulo','anunciosPendientes','notificaciones'));
    }

    public function listarCategoriasSugeridas()
    {

        $categorias = Categoria::where('estatus',2)->paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $titulo = "LISTADO DE CATEGORÍAS SUGERIDAS";
        $subtitulo = "Categorías Sugeridas";
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();

        return view('admin.categorias.index') ->with(compact('categorias','cantidad','titulo','subtitulo','anunciosPendientes','notificaciones'));
    }



    public function create()
    {
        //Obtener IP y seleccionar el pais
        //$ip = '201.189.101.104'; //chile
        $ip = $_SERVER["REMOTE_ADDR"];
        $arr_ip = geoip()->getLocation($ip);

        $cantidad = Anuncio::where('estado',0)->count();
        $anunciosPendientes = Anuncio::Pendiente()->get();
        return view('admin.categorias.create')->with(compact('arr_ip','cantidad','anunciosPendientes'));
    }


    public function store(Request $request)
    {

        $rules = [

            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
        ];
        $messages = [
            'nombre.required' => 'Es necesario ingresar el Nombre.',
            'descripcion.required' => 'Es necesario ingresar alguna descripción.',
        ];
        $this->validate($request, $rules, $messages);

        $categoria = new Categoria();
        $categoria->name = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->estatus = $request->input('estado');
        $categoria->country = $request->input('country');
        $categoria->user_id = Auth::user()->id;

        $categoria->save();
        $success = 'La Categoria se ha registrado correctamente.';
        return back()->with(compact('success'));
    }


    public function show(Categoria $categoria)
    {
        //
    }


    public function edit(Categoria $categoria)
    {
        //
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $categoria = Categoria::findOrFail($id);
        $categoria->name = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->estatus = $request->input('estado');
        $categoria->save();
        $success = 'La Categoria ha sido actualizada correctamente.';
        return back()->with(compact('success'));
    }


    public function destroy(Categoria $categoria)
    {
        //
    }


    public function sugerirCategoria(Request $request)
    {

        //Obtener IP y seleccionar el pais
        //$ip = '201.189.101.104'; //chile
        $ip = $_SERVER["REMOTE_ADDR"];
        $arr_ip = geoip()->getLocation($ip);

        $categoria = new Categoria();
        $categoria->name = $request->input('sug_categoria');
        $categoria->descripcion = "Sin descripción";
        $categoria->estatus = 2;
        $categoria->country = strtolower($arr_ip->iso_code);
        $categoria->user_id = Auth::user()->id;

        $categoria->save();
        $success = 'Exito, haz sugerido tu categoría satisfactóriamente.';
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        return back()->with(compact('success','anunciosPendientes'));
    }


    public function updateCategoriaPais(Request $request)
    {
        $code_country = $request->input('country');
        $id = $request->input('cat_id');

        $cat = Categoria::where('id', $id)->first();
        $cat->country = $code_country;
        $cat->save();

        return back();

    }
}
