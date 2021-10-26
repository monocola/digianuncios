<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected  $table = 'tickets';


    public  function estado($estado){

        if($estado==0){
            return "Abierto";
        }elseif($estado==1){
            return "Cerrado";
        }elseif($estado==2){
            return "Respondido";
        }

    }

    public  function tipoTicket($tipo){

        if($tipo==0){
            return "Soporte";
        }elseif($tipo==1){
            return "Ventas";
        }elseif($tipo==2){
            return "Facturación";
        }elseif($tipo==3){
            return "Diseño Gráfico";
        }elseif($tipo==4){
            return "Miseláneo";
        }

    }

    public  function prioridad($prioridad){

        if($prioridad==0){
            return "Baja";
        }elseif($prioridad==1){
            return "Media";
        }elseif($prioridad==2){
            return "Alta";
        }

    }

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class, 'anuncio_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
