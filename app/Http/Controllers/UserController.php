<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Anuncio;
use App\Categoria;
use App\Clicksurl;
use App\Comentario;
use App\Mail\welcomefromCeo;
use App\Message;
use App\Ticket;
use App\Vistos;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function index()

    {

        $categorias = Categoria::paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $titulo = "LISTADO DE CATEGORÍAS";
        $subtitulo = "Categorías Registradas";
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();

        $usersAdmin = User::where('tipo',8355023)->paginate(200);
        $usersClient = User::where('tipo',2)->paginate(200);
        $usersVisitor = User::where('tipo',1)->paginate(200);


        return view('admin.user.index') ->with(compact('usersClient','usersVisitor','usersAdmin','misTickets','anunciosMenu','tickets_cantidad','categorias','cantidad','titulo','subtitulo','anunciosPendientes','notificaciones'));


    }




    public function myProfile()
    {
        $categorias = Categoria::paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $titulo = "LISTADO DE CATEGORÍAS";
        $subtitulo = "Categorías Registradas";
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();

        return view('clientes.user.profile') ->with(compact('misTickets','anunciosMenu','tickets_cantidad','categorias','cantidad','titulo','subtitulo','anunciosPendientes','notificaciones'));
    }


    public function saveFile(Request $request)
    {

        $rules = [
            'file' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
        ];

        $messages = [

            'file.required' => 'Es necesario ingresar el archivo del arte.',
            'file.mimes' => 'El tipo de archivo no es permitido, solamente puede subir archivos con extensión: jpg, png, jpeg.',
            'file.max' => 'El archivo supera el tamaño permitido de 2Mb.',
        ];
        $this->validate($request, $rules, $messages);


        $id =  Auth::user()->id;
       $user = User::where('id', $id)->first();

        if($request->file('file')){
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/avatars/', $name);

            $user->avatar = $name;
            $user->save();
        }

        return back();


    }

    public function changePass(Request $request)
    {

        $id =  Auth::user()->id;
        $passCurrent =  Auth::user()->getAuthPassword();
        $passOld = $request->input('passold');

        $passNew = Hash::make($request->input('pass'));

        if(Hash::check($passOld,$passCurrent)){

            DB::table('users')
                    ->where('id', $id)
                    ->update(['password' => $passNew]);

            $notification = 'La clave ha sido cambiada safisfactóriamente.';
            return back()->with(compact('notification'));

        }else{

            $notificationerror = 'La clave actual ingresada no es correcta.';
            return back()->with(compact('notificationerror'));
        }


        //$user = User::where('id', $id)->first();


    }

    public function adminMyProfile()
    {
        $categorias = Categoria::paginate(50);
        $cantidad = Anuncio::where('estado',0)->count();
        $titulo = "LISTADO DE CATEGORÍAS";
        $subtitulo = "Categorías Registradas";
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        $anunciosMenu = Anuncio::where('user_id','=',Auth::user()->id)->paginate(3);
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();

        return view('admin.user.profile') ->with(compact('misTickets','anunciosMenu','tickets_cantidad','categorias','cantidad','titulo','subtitulo','anunciosPendientes','notificaciones'));

    }

    public function show($id)
    {




        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();

        $user = User::where('id',$id)->get();
        $level1 = User::where('id',$id)->first();
        $level = $level1->level;


        $ad_count = Anuncio::where('user_id', $id)->count();
        $comm_count = Comentario::where('user_propietary', $id)->count();
        $views_count = Vistos::where('user_propietary', $id)->count();
        $urls_count = Clicksurl::where('user_propietary', $id)->count();

        //dd($ad_count);



        return view('admin.user.show') ->with(compact('urls_count','level','id','views_count','ad_count','comm_count','user','misTickets','tickets_cantidad','anunciosPendientes','notificaciones'));


    }

    public function consult($id)
    {
        $anunciosPendientes = Anuncio::Pendiente()->Usuario()->get();
        $notificaciones = Message::Usuario()->estado()->get();
        $tickets_cantidad = Ticket::where('user_id','=',Auth::user()->id)->count();
        $misTickets = Ticket::where('user_id','=',Auth::user()->id)->get();

        $consults = Analytic::where('user_id',$id)->paginate(200);


        return view('admin.user.consult') ->with(compact('consults','misTickets','tickets_cantidad','anunciosPendientes','notificaciones'));

    }

    public function blocked($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['state' => 1]);

        return back();
    }

    public function unBlocked($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['state' => 0]);

        return back();
    }


    public function createAdmin(Request $request)
    {


        $user = new User();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->birthdate = $request->input('birthdate');
        $user->country = $request->input('country');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->tipo = 8355023;
        $user->state = 0;
        $user->visitor = $request->ip();
        $user->avatar = 'defaul-avatar.png';
        $user->save();

        $success = 'La Categoria se ha registrado correctamente.';
        return back()->with(compact('success'));

    }

    public function changeLevel(Request $request)
    {
        $id =    $request->input('user_id');
        $level = $request->input('level');


            DB::table('users')
                ->where('id', $id)
                ->update(['level' => $level]);

        return back();

    }

    public function changead()
    {

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['tipo' => 2]);

         $success  = "Desde ahora usted es un digianunciante, ya puede empezar a publicar sus anuncios.";
        return back()->with(compact('success'));

    }

    public function sendMessageCeo($id)
    {
        DB::table('users')
            ->where('email', $id)
            ->update(['ceo_send' => true]);

        $user = User::where('email', $id)->first();
        Mail::to($id)->send(new welcomefromCeo($user));
        return back();
    }


}
