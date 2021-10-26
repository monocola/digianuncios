<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clicksurl extends Model
{
    protected $table = 'cliks_url';

    protected $fillable = ['anuncio_id','ip','user_propietary'];
}
