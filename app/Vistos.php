<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vistos extends Model
{
    protected  $table = 'anuncios_vistos';

    protected $fillable = ['anuncio_id', 'user_id', 'ip','user_propietary'];

    public function vistos()
    {
        return $this->belongsTo(Vistos::class);
    }

}
