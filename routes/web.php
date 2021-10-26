<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);


Route::get('search', 'PortalController@buscador');
Route::get('autocomplete', 'PortalController@search')->name('autocomplete');


//portal index
Route::get('/', 'PortalController@index');
Route::get('/buscar', 'PortalController@buscar');
Route::get('/buscarporcodigo', 'PortalController@buscarporcodigo');
Route::get('/buscarporpalabra', 'PortalController@buscarporpalabra');
Route::get('/visto/{id}/{id1}/anuncio', 'VistosController@visto');
Route::get('/http:/{id}/{iz}/{ix}/.com', 'PortalController@url');


Route::get('/blocked','HomeController@blocked' );
Route::post('/comentario', 'ComentariosController@store');
Route::get('/quienes-somos','PortalController@about' );
Route::get('/preguntas-frecuentes','PortalController@questions' );
Route::get('/anuncia-con-nosotros','PortalController@announceswithus' );
Route::post('/changead', 'UserController@changead');


Route::post('/changecountry', 'SettingController@changeCountry');




Route::get('/home', 'HomeController@index')->name('home')->middleware('verified','blocked');




Route::group(['prefix' => 'admin', 'middleware' => [ 'auth' => 'admin' ,'verified','blocked']], function (){

    //Rutas Comentarios usuario
    Route::get('/comentario/{id}/{aid}/eliminar', 'ComentariosController@destroy');

    //Rutas Mis Anuncios
    Route::get('/misAnuncios', 'AnunciosController@index');
    Route::get('/misAnuncios/nuevo', 'AnunciosController@create');
    Route::post('/miAnuncio', 'AnunciosController@store');
    Route::get('/AdminAnuncio/{id}/detalle', 'AnunciosController@show');
    Route::get('/AdminAnuncio/{id}/edit', 'AnunciosController@edit');
    Route::post('/AdminAnuncio/{id}/edit', 'AnunciosController@update');
    Route::get('/AdminAnuncio/{id}/eliminar', 'AnunciosController@destroy');


    //Rutas Categorias
    Route::get('/categorias', 'AnunciosController@verCategorias');
    Route::post('/categoria', 'CategoriasController@sugerirCategoria');

    //Ruta tickets
    Route::get('/mistickets', 'TicketsController@index');
    Route::get('/mistickets-nuevo', 'TicketsController@create');
    Route::post('/miticket', 'TicketsController@store');
    Route::get('/miticket/{id}/ver', 'TicketsController@show');
    Route::post('/miticket-respuesta', 'TicketsController@responderTicket');

    //Ruta Vistos:
    Route::get('/{id}/views', 'VistosController@index');
    Route::get('/{id}/clicksurl', 'VistosController@vistosUrl');

    //Ruta Vistos comentarios
    Route::get('/{id}/comments', 'ComentariosController@comentarios');
    Route::get('/comentario/{id}/eliminar', 'ComentariosController@delete');

    //Ruta Mensajes
    Route::get('/notifications', 'MessageController@index');
    Route::get('/notifications/{id}/view', 'MessageController@show');


    //profile
    Route::get('/my-profile', 'UserController@myProfile');
    Route::post('/my-profile', 'UserController@saveFile');
    Route::post('/my-profile/pass', 'UserController@changePass');

    Route::get('/terminos-y-condiciones','PortalController@terms' );




});

Route::group(['prefix' => 'manager', 'middleware' => [ 'auth' => 'manager', 'blocked' ]], function (){



    Route::get('/admin', 'AdminHomeController@index');

    //Rutas Categorías
    Route::get('/categorias', 'CategoriasController@index');
    Route::get('/categoriassugeridas', 'CategoriasController@listarCategoriasSugeridas');
    Route::get('/categorias/nuevo', 'CategoriasController@create');
    Route::post('/categoria', 'CategoriasController@store');
    Route::post('/categorias/edit', 'CategoriasController@update');
    Route::post('/categoriacountry', 'CategoriasController@updateCategoriaPais');



    //Rutas Anuncios MANAGER
    Route::get('/ManagerAnuncios/Todos', 'AdminAnunciosController@index');
    Route::get('/ManagerAnuncios/Aprobados', 'AdminAnunciosController@anunciosAprobados');
    Route::get('/ManagerAnuncios/Pendientes', 'AdminAnunciosController@anunciosPendientes');
    Route::get('/ManagerAnuncios/Rechazados', 'AdminAnunciosController@anunciosRechados');
    Route::get('/ManagerAnuncios/nuevo', 'AdminAnunciosController@create');
    Route::post('/ManagerAnuncio', 'AdminAnunciosController@store');
    Route::get('/ManagerAnuncios/{id}/detalle', 'AdminAnunciosController@show');
    Route::post('/query', 'AdminAnunciosController@query');


    //rutas APROBAR o RECHAZAR anuncio
    Route::get('/{id}/aprobar', 'AdminAnunciosController@aprobar');
    Route::get('/{id}/rechazar', 'AdminAnunciosController@rechazar');

    //Ruta Mensajes
    Route::get('/notifications', 'MessageController@indexManager');
    Route::post('/notifications', 'MessageController@indexManagerQuery');
    Route::get('//notifications/{id}/view', 'MessageController@showManager');
    Route::get('/notifications/create', 'MessageController@create');
    Route::post('/notification', 'MessageController@store');

    //profile

    Route::get('/users', 'UserController@index');
    Route::get('/my-profile', 'UserController@adminMyProfile');
    Route::post('/my-profile', 'UserController@saveFile');
    Route::post('/my-profile/pass', 'UserController@changePass');
    Route::get('/view/{id}/users', 'UserController@show');
    Route::get('/consult/{id}/users', 'UserController@consult');
    Route::post('/admin/create', 'UserController@createAdmin');
    Route::post('/changelevel', 'UserController@changeLevel');





    Route::post('/{id}/users/blocked', 'UserController@blocked');
    Route::post('/{id}/users/unblock', 'UserController@unBlocked');

    Route::post('/{id}/users/sendMeCeo', 'UserController@sendMessageCeo');




    //Ruta tickets
    Route::get('/mistickets', 'TicketsController@indexAdmin');
    Route::get('/mistickets-nuevo', 'TicketsController@create');
    Route::post('/miticket', 'TicketsController@store');
    Route::get('/miticket/{id}/ver', 'TicketsController@showAdmin');
    Route::post('/miticket-respuesta', 'TicketsController@responderTicket');


    Route::get('/analytics-categories', 'AnalyticController@index');
    Route::get('/analytics-add', 'AnalyticController@adAnalytic');



});




//Rutas Pruebas
Route::get('/correo', function () {
    return view('mails.new1-ad');
});

