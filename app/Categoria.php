<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table ="categorias";

    public function scopePais($query, $country)
    {

        return  $query->where('country', $country);
    }
}
