<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comentario extends Model
{
   protected $table = 'comentarios';


    public function obtenerUsuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function scopeAnuncio($query,$id){

        return  $query->where('anuncio_id', $id);
    }

    public function scopeUsuario($query)
    {
        return  $query->where('user_propietary', Auth::user()->id);
    }


}
