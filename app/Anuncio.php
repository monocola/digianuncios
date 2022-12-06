<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Anuncio extends Model
{
    use SoftDeletes;
    protected $table = 'anuncios';

    protected $keyType = 'integer';

    protected $fillable = ['comentario', 'estado','deleted_at'];

   public  function estado($estado){

       if($estado==0){
           return "Pendiente";
       }elseif($estado==1){
           return "Aprobado";
       }elseif($estado==2){
           return "Rechazado";
       }

    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function cliks()
    {
        return $this->hasMany(Clicksurl::class);
    }

    public function vistos()
    {
        return $this->hasMany(Vistos::class, 'anuncio_id');
    }

    public function scopePendiente($query)
    {
        return  $query->where('estado', 0);
    }

    public function scopeUsuario($query)
    {
        return  $query->where('user_id', Auth::user()->id);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePais($query, $country)
    {
        return  $query->where('pais', $country);
    }


}
