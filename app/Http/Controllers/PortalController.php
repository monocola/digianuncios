<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Anuncio;
use App\Categoria;
use App\Clicksurl;
use App\Comentario;
use App\Setting;
use App\Ubicacion;
use function foo\func;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class PortalController extends Controller
{





    public function __construct()
    {
        Carbon::setLocale('es');
        setLocale(LC_TIME, 'es_ES');



    }

    public function index(){



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


        $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
        $ubicaciones = Ubicacion::pais($iso_code)->get();
        $comentarios = Comentario::orderBy('id','desc')->get();
        $anuncios = Anuncio::where('estado',2000)
                                ->pais($iso_code)
                                ->withCount(['comentarios'])
                                ->inRandomOrder()->paginate(150);

        $result = -2;
        $categoryName = '';
        $comments = false;

        $categories = true; //false se ocultan los iconos de las  categorias

        return view('welcome')->with(compact('comments','categoryName','categories','iso_code','result','anuncios','comentarios','categorias','ubicaciones'));
    }


    public function buscar(Request $request){

        $query1  = $request->input('buscar');
        $query2  = $request->input('lugar');
        $soloperu = $request->input('soloPeru');
        $concomen = $request->input('concomentarios');



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

        //Si  existen parametros de BUSCAR, no UBICACION y no SOLOCOMENTARIOS - MAIN
        if(!empty($query1) && empty($query2) && !isset($soloperu) && !isset($concomen)  ){


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

            //analytics
            if($query2 == null){
                $location = '-';
            }else{
                $location = $query2 ;
            }
            if($query1 == null){

                return back();

            }else{
                $query1 = $query1 ;
            }

            if(Auth::check()){
                $usId = Auth::user()->id;
            }else{
                $usId = 0;
            }


            $cat_name = $query1;

            $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
            $ubicaciones = Ubicacion::pais($iso_code)->get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where('estado',1)
                            ->pais($iso_code)
                            ->withCount(['comentarios'])
                            ->inRandomOrder()
                            ->where([
                                ['category_name','like', '%'.$cat_name.'%'],
                            ])
                            ->Paginate(50);

            $result = $anuncios->count();

            $categories = false;
            $comments = false;
            $categoryName = $query1;

            $ip = request()->ip();
            Analytic::create(['category_name' => $query1 ,'location' => $location,'ip' => $ip,'user_id' => $usId]);

            return view('welcome')->with(compact('comments','categories','iso_code','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));
        }



        //Si no existen parametros de buscar y ubicacion
        if(empty($query1) && empty($query2)){


            if(Auth::check()){
                $usId = Auth::user()->id;
            }else{
                $usId = 0;
            }


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


            $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
            $ubicaciones = Ubicacion::pais($iso_code)->get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where('estado',2000)
                                ->pais($iso_code)
                                ->withCount(['comentarios'])
                                ->inRandomOrder()
                                ->paginate(50);

            //analytics
            if($query2 == null){
                $location = '-';
            }else{
                $location = $query2 ;
            }
            if($query1 == null){
                return back();
            }else{
                $query1 = $query1 ;
            }


            $result = -2;

            $category =  Categoria::findOrFail($query1)->first();
            $categoryName = $category->name;


            $categories = false;
            $comments = false;

            $ip = request()->ip();
            Analytic::create(['categoria_id' => $query1 ,'location' => $location,'ip' => $ip,'user_id' => $usId]);

            return view('welcome')->with(compact('comments','iso_code','categories','arr_ip','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));
        }


        //Si  existen parametros de BUSCAR, UBICACION
        if(!empty($query1) && !empty($query2) && !isset($concomen)  ){

            //analytics
            if($query2 == null){
                $location = '-';
            }else{
                $location = $query2 ;
            }
            if($query1 == null){
                return back();
            }else{
                $query1 = $query1 ;
            }

            if(Auth::check()){
                $usId = Auth::user()->id;
            }else{
                $usId = 0;
            }



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

            $cat_name = $query1;

            $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
            $ubicaciones = Ubicacion::pais($iso_code)->get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where('estado',1)
                                ->pais($iso_code)
                                ->withCount(['comentarios'])
                                ->inRandomOrder()
                                ->where([
                                    ['category_name','like', '%'.$cat_name.'%'],
                                    ['distrito', 'like',"%$query2%"]])
                                ->orWhere('departamento',"%$query2%" )
                                ->Paginate(50);
            $result = $anuncios->count();

            $categories = false;
            $categoryName = $query1;
            $comments = false;

            $ip = request()->ip();
            Analytic::create(['category_name' => $query1 ,'location' => $location,'ip' => $ip,'user_id' => $usId]);

            return view('welcome')->with(compact('comments','categories','iso_code','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));
        }


        //Si  existen parametros de BUSCAR, no UBICACION, SOLOCOMENTARIOS
        if(!empty($query1) && empty($query2) && !isset($soloperu) && isset($concomen) ){

            //analytics
            if($query2 == null){
                $location = '-';
            }else{
                $location = $query2 ;
            }
            if($query1 == null){
                return back();
            }else{
                $query1 = $query1 ;
            }

            if(Auth::check()){
                $usId = Auth::user()->id;
            }else{
                $usId = 0;
            }



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


            $cat_name = $query1;

            $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
            $ubicaciones = Ubicacion::pais($iso_code)->get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where('estado',1)
                                ->pais($iso_code)
                                ->withCount(['comentarios'])
                                ->inRandomOrder()
                                ->where([
                                    ['category_name','like', '%'.$cat_name.'%'],
                                    ['comentario', true],
                                ])
                                ->Paginate(50);
            $result = $anuncios->count();

            $categories = false;
            $categoryName = $query1;
            $comments = true;

            $ip = request()->ip();
            Analytic::create(['category_name' => $query1 ,'location' => $location,'ip' => $ip,'user_id' => $usId]);

            return view('welcome')->with(compact('comments','categories','iso_code','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));
        }

        //Si  existen parametros de BUSCAR,  UBICACION, SOLOCOMENTARIOS
        if(!empty($query1) && !empty($query2) && !isset($soloperu) && isset($concomen) ){


            //analytics
            if($query2 == null){
                $location = '-';
            }else{
                $location = $query2 ;
            }
            if($query1 == null){
                return back();
            }else{
                $query1 = $query1 ;
            }

            if(Auth::check()){
                $usId = Auth::user()->id;
            }else{
                $usId = 0;
            }




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

            $cat_name = $query1;

            $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
            $ubicaciones = Ubicacion::pais($iso_code)->get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where('estado',1)
                                ->pais($iso_code)
                                ->withCount(['comentarios'])
                                ->inRandomOrder()
                                ->where([
                                    ['category_name','like', '%'.$cat_name.'%'],
                                    ['comentario', true],
                                    ['distrito', 'like',"%$query2%"]
                                ])
                                ->orWhere('departamento',"%$query2%" )
                                ->Paginate(50);
            $result = $anuncios->count();

            $categories = false;
            $categoryName = $query1;
            $comments = true;

            $ip = request()->ip();
            Analytic::create(['category_name' => $query1 ,'location' => $location,'ip' => $ip,'user_id' => $usId]);

            return view('welcome')->with(compact('comments','categories','iso_code','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));
        }



    }

    public function buscarporcodigo(Request $request){

        $query1  = $request->input('txt0');

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

        $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
        $ubicaciones = Ubicacion::pais($iso_code)->get();
        $comentarios = Comentario::orderBy('id','desc')->get();
        $anuncios = Anuncio::where([
                ['estado', 1],
                ['codigo', $query1],
                ])
                    ->withCount(['comentarios'])
                    ->pais($iso_code)
                    ->paginate(50);
        $result = $anuncios->count();
        $categoryName = null;

        $comments = false;

        $categories = false;

        return view('welcome')->with(compact('comments','categories','iso_code','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));

    }

    public function buscarporpalabra(Request $request){


        $query1  = $request->input('txt0');


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


        if($query1==null){


            $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
            $ubicaciones = Ubicacion::pais($iso_code)->get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where('estado',2000)
                                ->pais($iso_code)
                                ->withCount(['comentarios'])
                                ->inRandomOrder()->paginate(150);

            $result = $anuncios->count();
            $categoryName = null;
            $comments = false;

            $categories = false;

            return view('welcome')->with(compact('comments','categories','iso_code','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));
        }else{


            $query = '%'.$query1.'%';
            $categorias = Categoria::inRandomOrder()->pais($iso_code)->get();
            $ubicaciones = Ubicacion::pais($iso_code)->get();
            $comentarios = Comentario::orderBy('id','desc')->get();
            $anuncios = Anuncio::where([
                ['estado', 1],
                ['titulo','LIKE' ,$query],

            ])->orwhere('descripcion','LIKE' ,$query)
                            ->withCount(['comentarios'])
                            ->pais($iso_code)
                            ->paginate(50);
            $result = $anuncios->count();
            $categoryName = null;

            $comments = false;
            $categories = false;

            return view('welcome')->with(compact('comments','categories','iso_code','categoryName','result','anuncios','comentarios','categorias','ubicaciones'));


        }


    }

    public function url($ix,$iz,$id)
    {


        $anun = Anuncio::where('codigo',$id)->first();

        $url1 = $anun->sitioweb;

        Clicksurl::create(['anuncio_id' => $iz ,'ip' => request()->ip(), 'user_propietary' => $anun->user_id]);

        $http = 'http://';
        $url = $http.$url1;

        return redirect($url);
    }



    public function about()
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

        return view('pages.about')->with(compact('iso_code'));
    }

    public function questions()
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

        return view('pages.questions')->with(compact('iso_code'));
    }

    public function announceswithus()
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

        return view('pages.announceswithus')->with(compact('iso_code'));
    }

    public function terms()
    {
        return view('pages.terms');
    }


    public  function buscador(){

        $categorias = Categoria::inRandomOrder()->pais('pe')->get();
        $ubicaciones = Ubicacion::pais('pe')->get();
        $result = -2;
        $categories = false;
        $comentarios = Comentario::orderBy('id','desc')->get();
        $anuncios = Anuncio::where('estado',2000)
            ->pais('pe')
            ->withCount(['comentarios'])
            ->inRandomOrder()->paginate(150);
        return view('buscardor')->with(compact('categorias','ubicaciones','result','categories','anuncios','comentarios'));

    }

    public  function search(Request $request)
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


        $data = Categoria::where("name","LIKE","%{$request->input('query')}%")
            ->pais($iso_code)
            ->get();

        return response()->json($data);

    }

}
